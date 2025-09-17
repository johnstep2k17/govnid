<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AuditLog;

class AdminController extends Controller
{
    public function dashboard()
    {
        $q = request('q');
        $users = User::withTrashed()
            ->when($q, fn($qq) => $qq->where('name','like',"%$q%")->orWhere('email','like',"%$q%"))
            ->get();

        return view('admin.dashboard', compact('users'));
    }

    public function softDelete($id)
    {
        $u = User::find($id);
        if ($u) {
            $u->delete();

            // 🔽 LOG: after soft delete
            AuditLog::create([
                'user_id' => auth()->id(),
                'action'  => 'soft_delete_user',
                'details' => json_encode([
                    'target_id' => $u->id,
                    'email'     => $u->email,
                ]),
            ]);
        }
        return back();
    }

    public function restore($id)
    {
        $u = User::withTrashed()->find($id);
        if ($u) {
            $u->restore();

            // 🔽 LOG: after restore
            AuditLog::create([
                'user_id' => auth()->id(),
                'action'  => 'restore_user',
                'details' => json_encode([
                    'target_id' => $u->id,
                    'email'     => $u->email,
                ]),
            ]);
        }
        return back();
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->user();
        $admin->name  = $request->name  ?? $admin->name;
        $admin->email = $request->email ?? $admin->email;

        if ($request->hasFile('photo')) {
            // intentionally unsafe upload (no validation)
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $admin->photo = $filename;
        }

        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        // 🔽 LOG: after admin updates own profile
        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'admin_update_profile',
            'details' => json_encode([
                'target_id' => $admin->id,
                'email'     => $admin->email,
            ]),
        ]);

        return back()->with('msg','Profile updated!');
    }

    public function createUser()
    {
        return view('admin.create');
    }

    public function storeUser(Request $r)
    {
        $u = new User;
        $u->name  = $r->name;
        $u->email = $r->email;
        $u->role  = $r->role ?: 'user';
        $u->password = bcrypt($r->password ?: 'password123');

        if ($r->hasFile('photo')) {
            // intentionally unsafe upload (no validation)
            $f  = $r->file('photo');
            $fn = $f->getClientOriginalName();
            $f->move(public_path('uploads'), $fn);
            $u->photo = $fn;

        }

        $u->save();

        // 🔽 LOG: immediately after save
        AuditLog::create([
            'user_id' => auth()->id(),
            'action'  => 'create_user',
            'details' => json_encode([
                'target_id' => $u->id,
                'email'     => $u->email,
                'role'      => $u->role,
            ]),
        ]);

        return redirect('/admin/dashboard')->with('msg','User created.');
    }
}
