<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $library = Library::where('uid', $user->library_uid)->firstOrFail();
        $staffUsers = User::where('library_uid', $user->library_uid)->where('account_type', 'staff')->get();
        $prints = $library->prints()->orderBy('created_at', 'desc')->get();

        return view('library.admin-dashboard', compact('library', 'staffUsers', 'prints'));
    }

    public function createStaffForm()
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $library = Library::where('uid', $user->library_uid)->firstOrFail();
        $staffCount = User::where('library_uid', $user->library_uid)->where('account_type', 'staff')->count();

        if ($staffCount >= 5) {
            return back()->with('error', 'Maximum of 5 staff accounts already created.');
        }

        return view('library.create-staff', compact('library', 'staffCount'));
    }

    public function storeStaff(Request $request)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $library = Library::where('uid', $user->library_uid)->firstOrFail();
        $staffCount = User::where('library_uid', $user->library_uid)->where('account_type', 'staff')->count();

        if ($staffCount >= 5) {
            return back()->with('error', 'Maximum of 5 staff accounts already created.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'library_uid' => $library->uid,
            'account_type' => 'staff',
            'approval_status' => 'approved',
            'usertype' => 'user',
            'library' => $library->name,
            'addr' => '',
            'city' => $library->city,
            'state' => $library->state,
            'zip' => '',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('library.dashboard')->with('success', 'Staff account created successfully!');
    }

    public function editStaff($id)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $staffUser = User::findOrFail($id);

        if ($staffUser->library_uid !== $user->library_uid) {
            abort(403, 'Unauthorized');
        }

        return view('library.edit-staff', compact('staffUser'));
    }

    public function updateStaff(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $staffUser = User::findOrFail($id);

        if ($staffUser->library_uid !== $user->library_uid) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $staffUser->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        if (!empty($validated['password'])) {
            $staffUser->update(['password' => bcrypt($validated['password'])]);
        }

        return redirect()->route('library.dashboard')->with('success', 'Staff account updated successfully!');
    }

    public function deleteStaff($id)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $staffUser = User::findOrFail($id);

        if ($staffUser->library_uid !== $user->library_uid) {
            abort(403, 'Unauthorized');
        }

        $staffUser->delete();

        return redirect()->route('library.dashboard')->with('success', 'Staff account deleted successfully!');
    }
}
