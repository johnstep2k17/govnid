<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditLog;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $u = auth()->user();
        $u->name  = $request->name  ?? $u->name;
        $u->email = $request->email ?? $u->email;

        if ($request->hasFile('photo')) {
            // intentionally unsafe upload (no validation)
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $u->photo = $filename;

        }

        if ($request->password) {
            $u->password = bcrypt($request->password);
        }

        $u->save();

        // 🔽 LOG: immediately after save
        AuditLog::create([
            'user_id' => auth()->id(),                 // actor (who did it)
            'action'  => 'update_profile',             // action name
            'details' => json_encode([                 // free-form JSON
                'target_id' => $u->id,
                'email'     => $u->email,
            ]),
        ]);

        return back()->with('msg','Profile updated!');
    }
}
