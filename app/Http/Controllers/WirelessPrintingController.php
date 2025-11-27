<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\WirelessPrinting;
use App\Models\User;
use App\Models\Library;
use DB;
use App\Rules\ReCaptchaV3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatronAlertPrint;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;





class WirelessPrintingController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->where('usertype', '=', 'user')->get();       
        return view('user.index')->with(['users' => $users]);       
    }

    public function store(Request $request){

        $request->validate([
            'patron' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'copies' => 'nullable',
            'location' => 'required',
            'libnumber' => 'nullable',
            'g-recaptcha-response' => ['required', new ReCaptchaV3()],
        ]);

        $patron = $request->input('patron');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $copies = $request->input('copies');
        $location = $request->input('location');
        $libnumber = $request->input('libnumber');

            if($request)
            {
            $allowedfileExtension=['pdf','jpg','png','docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'txt'];
            $file = $request->file('print');
            $extension = $request->file('print')->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            //dd($check);
            if($check)
            {
                $timestamp = time();
                $originalFileName = $request->file('print')->getClientOriginalName();
                $baseName = pathinfo($originalFileName, PATHINFO_FILENAME);
                $tempFileName = $timestamp.'_'.$originalFileName;
                $pdfFileName = $timestamp.'_'.$baseName.'.pdf';

                // Store the uploaded file temporarily
                $filePath = $request->print->storeAs('./public/prints', $tempFileName);

                // Convert to PDF if not already a PDF or image
                if(!in_array($extension, ['pdf', 'jpg', 'png', 'txt'])) {
                    $this->convertToPdf($tempFileName, $pdfFileName);
                    // Delete the original file after conversion
                    Storage::delete('./public/prints/'.$tempFileName);
                    $finalFileName = $pdfFileName;
                } else {
                    $finalFileName = $tempFileName;
                }

                $print = DB::table('wp')->insert([
                    'patron' => $patron,
                    'phone' => $phone,
                    'email' => $email,
                    'copies' => $copies,
                    'location' => $location,
                    'libnumber' => $libnumber,
                    'file' => $finalFileName,
                    'created_at' => Now(),
                    'updated_at' => Now(),
                ]);
                $customerEmail = $email;

                Mail::to($customerEmail)->send(new PatronAlertPrint($request));

                return redirect(route('user.index'))->with('success', 'print uploaded successfully!');
                      }



}
else
{
    return redirect(route('user.index'))->with('error', 'print failed!');
}
    }

    private function convertToPdf($inputFileName, $outputFileName)
    {
        $inputPath = storage_path('app/public/prints/'.$inputFileName);
        $outputPath = storage_path('app/public/prints/'.$outputFileName);

        $process = new Process([
            'libreoffice',
            '--headless',
            '--convert-to',
            'pdf',
            '--outdir',
            storage_path('app/public/prints'),
            $inputPath
        ]);

        $process->setTimeout(300); // 5 minute timeout

        try {
            $process->mustRun();
        } catch (ProcessFailedException $e) {
            throw new \Exception('PDF conversion failed: '.$e->getMessage());
        }
    }

    public function landing(){
        $user = Auth()->user();
        $usertype = $user->usertype;

        if($usertype=='user'){
            // Check if user belongs to a new library system
            if($user->library_uid) {
                $library = Library::where('uid', $user->library_uid)->first();
                $wps = WirelessPrinting::orderBy('id', 'desc')
                    ->where('library_uid', $user->library_uid)
                    ->get();
            } else {
                // Fall back to old system using location name
                $library = $user->library;
                $wps = WirelessPrinting::orderBy('id', 'desc')
                    ->where('location', '=', $library)
                    ->get();
            }

            return view('dashboard')->with(['wps' => $wps]);
        }
        else {
            return view('user.pending');
        }
    }

    public function delete(WirelessPrinting $wp){
        $file = $wp->file;
        if(Storage::exists('./public/prints/'.$file)){
            Storage::delete('./public/prints/'.$file);
            Storage::delete('prints/'.$file);
            $wp->delete();

          
        }else{
            dd('File does not exist.');
        }
       

        return redirect(route('dashboard'))->with('success', 'Print deleted Succesffully!');
    }

    public function getFile(WirelessPrinting $id)
    {
        $library =  Auth()->user()->library;

        $loc = $id->location;

        if($library == $loc) {

        $filename = ('app/public/prints/'. $id->file);

            //dd($library);
        return response()->download(storage_path($filename), null, [], null);

        }

        else {
            echo 'you are not allowed';
        }
    }

    public function subdomainForm($slug)
    {
        $library = Library::where('slug', $slug)->firstOrFail();

        if ($library->status !== 'approved') {
            abort(404, 'Library not found or not approved');
        }

        return view('subdomain.print-form', compact('library'));
    }

    public function subdomainStore(Request $request, $slug)
    {
        $library = Library::where('slug', $slug)->firstOrFail();

        if ($library->status !== 'approved') {
            abort(404, 'Library not found or not approved');
        }

        $request->validate([
            'patron' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'copies' => 'nullable',
            'g-recaptcha-response' => ['required', new ReCaptchaV3()],
        ]);

        $patron = $request->input('patron');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $copies = $request->input('copies');

        if ($request->hasFile('print')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'txt'];
            $file = $request->file('print');
            $extension = $request->file('print')->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $timestamp = time();
                $originalFileName = $request->file('print')->getClientOriginalName();
                $baseName = pathinfo($originalFileName, PATHINFO_FILENAME);
                $tempFileName = $timestamp . '_' . $originalFileName;
                $pdfFileName = $timestamp . '_' . $baseName . '.pdf';

                $filePath = $request->print->storeAs('./public/prints', $tempFileName);

                if (!in_array($extension, ['pdf', 'jpg', 'png', 'txt'])) {
                    $this->convertToPdf($tempFileName, $pdfFileName);
                    Storage::delete('./public/prints/' . $tempFileName);
                    $finalFileName = $pdfFileName;
                } else {
                    $finalFileName = $tempFileName;
                }

                WirelessPrinting::create([
                    'patron' => $patron,
                    'phone' => $phone,
                    'email' => $email,
                    'copies' => $copies,
                    'location' => $library->name,
                    'libnumber' => $library->uid,
                    'file' => $finalFileName,
                    'library_uid' => $library->uid,
                    'library_id' => $library->id,
                ]);

                if ($email) {
                    Mail::to($email)->send(new PatronAlertPrint($request));
                }

                return redirect()->route('subdomain.form', ['slug' => $slug])->with('success', 'Print uploaded successfully!');
            }
        }

        return redirect()->route('subdomain.form', ['slug' => $slug])->with('error', 'Print upload failed!');
    }


}