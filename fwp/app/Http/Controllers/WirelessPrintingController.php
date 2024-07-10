<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\wp;
use DB;

class wpController extends Controller
{
    public function index(){
        $prints = wp::orderBy('id', 'desc')->get();       
        return view('wp.index')->with(['prints' => $prints]);       
    }

    public function store(Request $request){

        $request->validate([
            'patron' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'copies' => 'nullable',
            'location' => 'required',
            'libnumber' => 'nullable',
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
            $file = $request->file('file');
            $filename = time().'_'.$request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            //dd($check);
            if($check)
            {
            $request->file->storeAs('./public/wp', $filename);
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
                      return redirect(route('cr.wp'))->with('success', 'print uploaded successfully!');

}
else
{
    return redirect(route('cr.wp'))->with('error', 'print failed!');
}
    }

    public function landing(){
        $wps = wp::orderBy('id', 'desc')->get();

        return view('admin.wp')->with(['wps' => $wps]);        
    }

    public function delete(wp $wp){
        $file = $wp->file;
        if(Storage::exists('./public/wp/'.$file)){
            Storage::delete('./public/wp/'.$file);
            Storage::delete('wp/'.$file);
            $wp->delete();

          
        }else{
            dd('File does not exist.');
        }
       

        return redirect(route('admin.wp'))->with('success', 'Print deleted Succesffully!');
    }


}