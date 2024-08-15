<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use App\Models\User;
use DB;
use App\Rules\ReCaptchaV3;
use Illuminate\Support\Facades\Auth;




class ContactController extends Controller
{
    public function index(){     
        return view('contact.index');       
    }

    public function store(Request $request){

        $request->validate([
            'patron' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptchaV3()],
        ]);

        $patron = $request->input('patron');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $message = $request->input('message');

            $user = DB::table('contact')->insert([
                'patron' => $patron,
                'phone' => $phone,
                'email' => $email,
                'message' => $message,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);


                        
                      
    return redirect(route('contact.index'))->with('success', 'Thank you for your message');

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