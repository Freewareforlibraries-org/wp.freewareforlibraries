<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\WirelessPrinting;
use App\Models\User;
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
        $usertype=Auth()->user()->usertype;

        if($usertype=='user'){
        $library =  Auth()->user()->library;

        $wps = WirelessPrinting::orderBy('id', 'desc')->where('location', '=', $library)->get();

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


}