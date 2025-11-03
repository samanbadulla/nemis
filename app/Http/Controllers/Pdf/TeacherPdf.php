<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use misterspelik\LaravelPdf\Facades\Pdf as PDF;
use Illuminate\Http\Request;

class TeacherPdf extends Controller
{
    public function generateSimplePdf()
    {
        
        $pdf = PDF::loadView('pdf.teacher-profile-pdf');
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
