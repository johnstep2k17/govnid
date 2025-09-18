<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AuditLog;

class AdminController extends Controller
{
    // ----------------------
    // Admin Dashboard
    // ----------------------
    public function dashboard(Request $request)
    {
        $q = $request->get('q');

        $users = \App\Models\User::withTrashed()   
        ->when($q, function ($query, $q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        })
        ->orderBy('id', 'asc')
        ->paginate(10)
        ->withQueryString();

    return view('admin.dashboard', compact('users', 'q'));
}

    // ----------------------
    // Create User Form
    // ----------------------
    public function createUser()
    {
        return view('admin.create');
    }

    // ----------------------
    // Store User
    // ----------------------
    public function storeUser(Request $request)
    {
        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role  = $request->role ?? 'user';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $user->photo = $filename;
        }

        $user->save();

        // log to audit
        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'admin_create_user',
            'details' => ['target_id' => $user->id],
        ]);

        return redirect()->route('admin.dashboard')->with('msg','User created!');
    }

    // ----------------------
    // Soft Delete
    // ----------------------
    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'admin_soft_delete_user',
            'details' => ['target_id' => $user->id],
        ]);

        return back()->with('msg','User soft deleted');
    }

    // ----------------------
    // Restore
    // ----------------------
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'admin_restore_user',
            'details' => ['target_id' => $user->id],
        ]);

        return back()->with('msg','User restored');
    }

    // ----------------------
    // Update Profile (Admin)
    // ----------------------
    public function updateProfile(Request $request)
    {
        $admin = auth()->user();
        $admin->name  = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $admin->photo = $filename;
        }

        $admin->save();

        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'admin_update_profile',
            'details' => ['target_id' => $admin->id],
        ]);

        return back()->with('msg','Profile updated!');
    }

    // ----------------------
    // Audit Logs
    // ----------------------
    public function audit()
    {
        $logs = AuditLog::latest()->paginate(15);
        return view('admin.audit', compact('logs'));
    }
}
