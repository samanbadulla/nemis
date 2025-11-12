<?php

use App\Livewire\Teacher\TeacherEdit;
use App\Livewire\Teacher\TeacherList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Teacher\TeacherCreate;
use App\Http\Controllers\Pdf\TeacherId;
use App\Http\Controllers\Pdf\TeacherPdf;
use App\Livewire\Teacher\BulkTeachersImport;
use App\Livewire\Teacher\Profile\TeacherIndex;
use App\Livewire\Teacher\Profile\TeacherFamily;
use App\Livewire\Teacher\Profile\TeacherEmployment;
use App\Livewire\Teacher\Profile\TeacherQualification;
use App\Exports\TeachersTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

Route::middleware(['auth'])->group(function () {

    Route::get('teacher/list', TeacherList::class)->name('teacher.list')->middleware(['permission:view teachers list']);
    Route::get('teacher/{id}/profile/index', TeacherIndex::class)->name('teacher.profile.index')->middleware(['permission:view teachers profile genaral']);
    Route::get('teacher/{id}/profile/qualification', TeacherQualification::class)->name('teacher.profile.qualification')->middleware(['permission:view teachers profile qualification']);
    Route::get('teacher/{id}/profile/employment', TeacherEmployment::class)->name('teacher.profile.employment')->middleware(['permission:view teachers profile employment']);
    Route::get('teacher/{id}/profile/family', TeacherFamily::class)->name('teacher.profile.family')->middleware(['permission:view teachers profile family']);
    Route::get('/pdf/id/{id}', [TeacherId::class, 'generatePDF'])->name('teacher.id.pdf')->middleware(['permission:view teachers profile id']);
    Route::get('/pdf/profile/{id}', [TeacherPdf::class, 'generateSimplePdf'])->name('teacher.profile.pdf')->middleware(['permission:view teachers profile pdf']);

    Route::get('teacher/create', TeacherCreate::class)->name('teacher.create')->middleware(['permission:create teachers']);


    Route::middleware(['permission:teacher bulk upload'])->group(function () {
        // Routes accessible only by teachers with 'create teachers' permission
        Route::get('teacher/bulk-upload', BulkTeachersImport::class)->name('teacher.bulk.upload');
        Route::get('/download-teachers-template', function () {
            return Excel::download(new TeachersTemplateExport, 'teachers_import_template.xlsx');
        })->name('teachers.download.template');
    });

    Route::middleware(['permission:edit teachers'])->group(function () {
        Route::get('teacher/edit', TeacherEdit::class)->name('teacher.edit');
    });
});
