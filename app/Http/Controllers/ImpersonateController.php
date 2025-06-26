<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    // Start
    public function start($id)
    {
        $userToImpersonate = User::findOrFail($id);

        // Only For Administrator
        if (session('role_name') !== 'administrator') {
            abort(403);
        }

        // Save ID Admin In Session
        session(['impersonate_id' => auth()->id()]);

        // Login As User Target
        Auth::login($userToImpersonate);

        // Multi Role
        if ($userToImpersonate->multi_role) {
            session([
                'user_id' => $userToImpersonate->id,
                'multi_role' => true,
                'role_id' => null,
                'role_name' => null,
            ]);

            return redirect()->route('check-access')->with('message', 'Silakan pilih peran untuk melanjutkan.');
        }

        // Single Role
        session([
            'user_id' => $userToImpersonate->id,
            'role_id' => $userToImpersonate->role_id,
            'role_name' => $userToImpersonate->role_name,
            'multi_role' => false,
        ]);

        return redirect(route('dashboard'))->with('message', 'Now impersonating as ' . $userToImpersonate->name);
    }

    // Stop
    public function stop(Request $request)
    {
        $originalId = session('impersonate_id');

        if (!$originalId) {
            return redirect(route('dashboard'))->with('error', 'Not impersonating any user.');
        }

        $originalUser = User::find($originalId);
        Auth::login($originalUser);

        session()->forget('impersonate_id');

        session([
            'role_id' => 1,
            'role_name' => 'administrator'
        ]);

        return redirect(route('users'))->with('message', 'Back to admin account.');
    }
}
