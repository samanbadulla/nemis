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
    Route::get('principal/list', PrincipalList::class)->name('principal.list')->middleware(['permission:view principals list']);
    Route::get('principal/{id}/profile/index', PrincipalIndex::class)->name('principal.profile.index')->middleware(['permission:view principal profile genaral']);
    Route::get('principal/{id}/profile/qualification', PrincipalQualification::class)->name('principal.profile.qualification')->middleware(['permission:view principal profile qualification']);
    Route::get('principal/{id}/profile/employment', PrincipalEmployment::class)->name('principal.profile.employment')->middleware(['permission:view principal profile employment']);
    Route::get('principal/{id}/profile/family', PrincipalFamily::class)->name('principal.profile.family')->middleware(['permission:view principal profile family']);

    Route::get('principal/create', PrincipalCreate::class)->name('principal.create')->middleware(['permission:create principals']);
    Route::get('principal/edit', PrincipalEdit::class)->name('principal.edit')->middleware(['permission:edit principals']);
});
