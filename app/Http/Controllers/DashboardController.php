<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Institution;
use Illuminate\Http\Request;
use App\Models\ProvincesList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $institutionCount = Institution::active()->count();
        $teachersCount = Teacher::count();
        //$provinceCounts = ProvincesList::withCount(['districts.institutions'])->get();

        $provinceCounts = DB::table('institutions')
        ->join('districts_lists', 'institutions.district_id', '=', 'districts_lists.district_id')
        ->join('provinces_lists', 'districts_lists.province_id', '=', 'provinces_lists.province_id')
        ->select('provinces_lists.province_name', DB::raw('COUNT(institutions.id) as total_institutions'))
        ->groupBy('provinces_lists.province_name')
        ->get();

        //dd($provinceCounts);

        return view('dashboard',[
            'user' => $user,
            'institutionCount' => $institutionCount,
            'teachersCount' => $teachersCount,
            'provinceCounts' => $provinceCounts,
        ]); // Ensure this Blade file exists
    }
}
