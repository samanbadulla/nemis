<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Principal\PrincipalEdit;
use App\Livewire\Principal\PrincipalList;
use App\Livewire\Principal\PrincipalCreate;
use App\Livewire\Principal\Profile\PrincipalIndex;
use App\Livewire\Principal\Profile\PrincipalFamily;
use App\Livewire\Principal\Profile\PrincipalEmployment;
use App\Livewire\Principal\Profile\PrincipalQualification;


Route::middleware(['auth'])->group(function () {
    Route::get('principal/list', PrincipalList::class)->name('principal.list');
    Route::get('principal/create', PrincipalCreate::class)->name('principal.create');
    Route::get('principal/edit', PrincipalEdit::class)->name('principal.edit');
    Route::get('principal/{id}/profile/index', PrincipalIndex::class)->name('principal.profile.index');
    Route::get('principal/{id}/profile/qualification', PrincipalQualification::class)->name('principal.profile.qualification');
    Route::get('principal/{id}/profile/employment', PrincipalEmployment::class)->name('principal.profile.employment');
    Route::get('principal/{id}/profile/family', PrincipalFamily::class)->name('principal.profile.family');
});
