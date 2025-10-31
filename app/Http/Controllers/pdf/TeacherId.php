<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

class TeacherId extends Controller
{
    public function generatePDF(Request $request, $id)
    {
    // Sample data
    $teacher = [
        'name'       => 'Mr. S. Perera',
        'teacher_id' => 'TCH2025001',
        'subject'    => 'Mathematics',
        'phone'      => '0712345678',
        'photo'      => public_path('images/employee.png'),
    ];

    // Create PDF instance
    $pdf = new \TCPDF('L', 'mm', [86, 54], true, 'UTF-8', false);
    $pdf->SetMargins(2, 2, 2);
    $pdf->SetAutoPageBreak(false, 0);
    $pdf->AddPage();

    $photo = file_exists($teacher['photo']) 
             ? $teacher['photo'] 
             : public_path('images/user_profile.png');

    $html = '
    <style>
        .card { border-radius:6px; padding:3px; text-align:center; font-family:helvetica; }
        .title { font-size:10px; font-weight:bold; color:#003366; }
        .name { font-size:9px; font-weight:bold; margin-top:2px; }
        .info { font-size:8px; }
        img { border-radius:50%; border:1px solid #003366; }
    </style>

    <div class="card">
        <div class="title">ABC National School</div>
        <img src="'.$photo.'" width="22" height="22" style="margin-top:3px;"><br>
        <div class="name">'.$teacher['name'].'</div>
        <div class="info">ID: '.$teacher['teacher_id'].'</div>
        <div class="info">Subject: '.$teacher['subject'].'</div>
        <div class="info">Phone: '.$teacher['phone'].'</div>
    </div>
    ';

    $pdf->writeHTML($html, true, false, true, false, '');

    return $pdf->Output('teacher-id-card.pdf', 'I');
    }
}
