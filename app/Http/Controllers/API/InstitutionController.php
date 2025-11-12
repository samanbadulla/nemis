<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function institutionList(Request $request)
    {
        $page = $request->input('page', 1); // default = 1 if not provided

        $institutions = Institution::active()->paginate(20, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'current_page' => $page,
            'data' => $institutions,
        ]);
    }
}
