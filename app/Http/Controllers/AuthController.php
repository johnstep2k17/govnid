<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() { return view('auth.login'); }

public function doLogin(\Illuminate\Http\Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // include soft-deleted in lookup so we can show a clear message
    $user = \App\Models\User::withTrashed()->where('email', $email)->first();

    if (!$user) {
        return back()->with('error', 'Invalid login');
    }

    // block soft-deleted accounts from logging in
    if ($user->deleted_at) {
        return back()->with('error', 'Account is deleted. Ask an admin to restore it.');
    }

    // check password manually, then log in
    if (\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
        \Illuminate\Support\Facades\Auth::login($user);

        return $user->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/user/dashboard');
    }

    return back()->with('error', 'Invalid login');
}


    public function logout() { Auth::logout(); return redirect('/'); }

    // NEW
    public function showRegister() { return view('auth.register'); }

    // NEW (intentionally no validation)
public function doRegister(Request $r)
{
    $u = new \App\Models\User;
    $u->name  = $r->name;
    $u->email = $r->email;
    $u->role  = 'user';
    $u->password = bcrypt($r->password ?: 'password123');

    // Citizen fields
    $u->national_id       = $r->national_id;
    $u->address           = $r->address;
    $u->birthday          = $r->birthday;
    $u->phone             = $r->phone;
    $u->blood_type        = $r->blood_type;
    $u->emergency_contact = $r->emergency_contact;

    if ($r->hasFile('photo')) {
        $f  = $r->file('photo');
        $fn = $f->getClientOriginalName();   // keep original name
        $f->move(public_path('uploads'), $fn);
        $u->photo = $fn;
    }

    $u->save();

    // ❌ remove auto-login
    // \Auth::login($u);

    // ✅ redirect to login page instead
    return redirect('/login')->with('msg','Registration successful! Please log in.');
}


}
