<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\WirelessPrinting;
use App\Models\User;
use DB;
use App\Rules\ReCaptchaV3;
use Illuminate\Support\Facades\Auth;




class WirelessPrintingController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->get();       
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
            $allowedfileExtension=['pdf','jpg','png','docx', 'txt'];
            $file = $request->file('print');
            $filename = time().'_'.$request->file('print')->getClientOriginalName();
            $extension = $request->file('print')->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            //dd($check);
            if($check)
            {
            $request->print->storeAs('./public/prints', $filename);
            $user = DB::table('wp')->insert([
                'patron' => $patron,
                'phone' => $phone,
                'email' => $email,
                'copies' => $copies,
                'location' => $location,
                'libnumber' => $libnumber,
                'file' => $filename,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);


                        
                      }
                      return redirect(route('user.index'))->with('success', 'print uploaded successfully!');

}
else
{
    return redirect(route('user.index'))->with('error', 'print failed!');
}
    }

    public function landing(){
        $library =  Auth()->user()->library;

        $wps = WirelessPrinting::orderBy('id', 'desc')->where('location', '=', $library)->get();

        return view('dashboard')->with(['wps' => $wps]);        
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