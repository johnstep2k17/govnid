<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() { return view('auth.login'); }

    public function doLogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return auth()->user()->role === 'admin'
                ? redirect('/admin/dashboard')
                : redirect('/user/dashboard');
        }
        return back()->with('error','Invalid login');
    }

    public function logout() { Auth::logout(); return redirect('/'); }

    // NEW
    public function showRegister() { return view('auth.register'); }

    // NEW (intentionally no validation)
    public function doRegister(Request $r)
    {
        $u = new User;
        $u->name = $r->name;
        $u->email = $r->email;
        $u->role = 'user';
        if (!empty($r->password)) {
            $u->password = bcrypt($r->password);
        } else {
            $u->password = bcrypt('password123'); // weak default
        }

        if ($r->hasFile('photo')) {
            $f = $r->file('photo');
            $fn = time().'_'.$f->getClientOriginalName();
            $f->move(public_path('uploads'), $fn); // intentionally unsafe
            $u->photo = $fn;
        }
        $u->save();

        Auth::login($u);
        return redirect('/user/dashboard')->with('msg','Registered!');
    }
}
