<?php

namespace App\Http\Controllers;

use App\Models\Personalia\Members;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $crew = Members::where('rank', 'Crew')->where('is_active', 1)->get();
        $pengurus = Members::where('rank', 'Pengurus')->where('is_active', 1)->get();
        $alumni = Members::where('rank', 'Alumni')->get();
        $session = $request->session()->all();

        $data = [
            'title' => 'Beranda',
            'crew' => $crew,
            'pengurus' => $pengurus,
            'alumni' => $alumni,
            'session' => $session
        ];

        return view('contents.administrator.dashboard.home', $data);
    }
}
