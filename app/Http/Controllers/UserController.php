<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AuditLog;

class UserController extends Controller
{
    /**
     * Show user dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }

    /**
     * Update user profile (with audit log)
     */
    public function updateProfile(Request $r)
    {
        $u = auth()->user();

        // Update fields (no validation by design for vuln exercise)
        $u->name              = $r->name;
        $u->email             = $r->email;
        $u->national_id       = $r->national_id;
        $u->address           = $r->address;
        $u->birthday          = $r->birthday;
        $u->phone             = $r->phone;
        $u->blood_type        = $r->blood_type;
        $u->emergency_contact = $r->emergency_contact;

        // Password change (optional)
        if ($r->filled('password')) {
            $u->password = Hash::make($r->password);
        }

        // Photo upload (any file allowed – insecure by design)
        if ($r->hasFile('photo')) {
            $file = $r->file('photo');
            $filename = $file->getClientOriginalName(); // ⚠ keeps original filename
            $file->move(public_path('uploads'), $filename);
            $u->photo = $filename;
        }

        // Save changes
        $u->save();

        // ✅ Write audit log
        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'user_update_profile',
            'details' => ['target_id' => $u->id],
        ]);

        return back()->with('msg', 'Profile updated');
    }
}
