<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $institutionCount = Institution::active()->count();

        return view('dashboard',[
            'user' => $user,
            'institutionCount' => $institutionCount,
        ]); // Ensure this Blade file exists
    }
}
