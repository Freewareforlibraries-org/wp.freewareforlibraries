<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LibraryRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.library-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'library_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|unique:libraries,email',
            'contact_phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:users,email',
            'admin_password' => 'required|string|min:8|confirmed',
        ]);

        $slug = Str::slug($validated['library_name']);
        $uid = $slug . '-' . Str::random(6);

        $library = Library::create([
            'name' => $validated['library_name'],
            'slug' => $slug,
            'email' => $validated['contact_email'],
            'uid' => $uid,
            'contact_name' => $validated['contact_name'],
            'contact_phone' => $validated['contact_phone'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'status' => 'pending',
        ]);

        User::create([
            'name' => $validated['admin_name'],
            'email' => $validated['admin_email'],
            'password' => bcrypt($validated['admin_password']),
            'library_uid' => $uid,
            'account_type' => 'admin',
            'approval_status' => 'pending',
            'usertype' => 'admin',
            'library' => $validated['library_name'],
            'phone' => $validated['contact_phone'],
            'addr' => '',
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => '',
            'email_verified_at' => now(),
        ]);

        return redirect('/')->with('success', 'Library registration submitted! Awaiting admin approval.');
    }
}
