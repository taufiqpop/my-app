<?php

namespace App\Http\Controllers;

use App\Models\Personalia\Members;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $data = [
            'title' => 'Beranda',
        ];

        return view('contents.administrator.dashboard.home', $data);
    }
}
