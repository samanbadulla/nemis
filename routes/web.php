<?php

use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Users\UserIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\Teacher\TeacherEdit;
use App\Livewire\Teacher\TeacherList;
use Illuminate\Support\Facades\Route;

use App\Livewire\Offices\OfficesIndex;
use App\Livewire\Teacher\TeacherCreate;
use App\Livewire\Teacher\TeacherProfile;

use App\Livewire\Principal\PrincipalEdit;
use App\Livewire\Principal\PrincipalList;
use App\Livewire\Principal\PrincipalCreate;

use App\Livewire\Offices\Deo\DeoOfficesList;
use App\Livewire\Offices\Moe\MoeOfficesList;
use App\Livewire\Offices\Peo\PeoOfficesList;

use App\Livewire\Offices\Zeo\ZeoOfficesList;
use App\Http\Controllers\DashboardController;
use App\Livewire\Offices\Deo\DeoOfficesCreate;
use App\Livewire\Offices\Moe\MoeOfficesCreate;
use App\Livewire\Offices\Peo\PeoOfficesCreate;
use App\Livewire\Offices\Pmoe\PmoeOfficesList;
use App\Livewire\Offices\Zeo\ZeoOfficesCreate;
use App\Livewire\Teacher\Profile\TeacherIndex;
use App\Livewire\Offices\Deo\DeoOfficesProfile;
use App\Livewire\Offices\Moe\MoeOfficesProfile;
use App\Livewire\Offices\Peo\PeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZonaleOfficeByPeo;
use App\Livewire\Teacher\Profile\TeacherFamily;
use App\Livewire\Institutions\InstitutionsIndex;
use App\Livewire\Offices\Pmoe\PmoeOfficesCreate;
use App\Livewire\Institutions\InstitutionsCreate;
use App\Livewire\Offices\Pmoe\PmoeOfficesProfile;
use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Principal\Profile\PrincipalIndex;
use App\Livewire\Principal\Profile\PrincipalFamily;
use App\Livewire\Teacher\Profile\TeacherEmployment;
use App\Livewire\Offices\Deo\DivisionalOfficeByZone;
use App\Livewire\Offices\Peo\ProvincialOfficeByPmoe;
use App\Livewire\Teacher\Profile\TeacherQualification;
use App\Livewire\Principal\Profile\PrincipalEmployment;
use App\Livewire\Principal\Profile\PrincipalQualification;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('users', UserIndex::class)->name('users.index');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{id}/edit', UserEdit::class)->name('users.edit');

    Route::get('institutions', InstitutionsIndex::class)->name('institutions.index');
    Route::get('institutions/create', InstitutionsCreate::class)->name('institutions.create');
    Route::get('institutions/{id}/profile', InstitutionsProfile::class)->name('institutions.profile');

    Route::get('offices', OfficesIndex::class)->name('offices.index');

    Route::get('offices/deo/list', DeoOfficesList::class)->name('offices.deo.list');
    Route::get('offices/deo/create', DeoOfficesCreate::class)->name('offices.deo.create');
    Route::get('offices/deo/{id}/zone', DivisionalOfficeByZone::class)->name('offices.deo.by-zone');
    Route::get('offices/deo/{id}/profile', DeoOfficesProfile::class)->name('offices.deo.profile');

    Route::get('offices/zeo/list', ZeoOfficesList::class)->name('offices.zeo.list');
    Route::get('offices/zeo/create', ZeoOfficesCreate::class)->name('offices.zeo.create');
    Route::get('offices/zeo/{id}/province', ZonaleOfficeByPeo::class)->name('offices.zeo.by-province');
    Route::get('offices/zeo/{id}/profile', ZeoOfficesProfile::class)->name('offices.zeo.profile');

    Route::get('offices/peo/list/', PeoOfficesList::class)->name('offices.peo.list');
    Route::get('offices/peo/create', PeoOfficesCreate::class)->name('offices.peo.create');
    Route::get('offices/peo/{id}/pmoe', ProvincialOfficeByPmoe::class)->name('offices.peo.by-pmoe');
    Route::get('offices/peo/{id}/profile', PeoOfficesProfile::class)->name('offices.peo.profile');

    Route::get('offices/pmoe/list', PmoeOfficesList::class)->name('offices.pmoe.list');
    Route::get('offices/pmoe/create', PmoeOfficesCreate::class)->name('offices.pmoe.create');
    Route::get('offices/pmoe/{id}/profile', PmoeOfficesProfile::class)->name('offices.pmoe.profile');

    Route::get('offices/moe/list', MoeOfficesList::class)->name('offices.moe.list');
    Route::get('offices/moe/create', MoeOfficesCreate::class)->name('offices.moe.create');
    Route::get('offices/moe/{id}/profile', MoeOfficesProfile::class)->name('offices.moe.profile');

        // In web.php or api.php
    Route::middleware(['role:super admin'])->group(function () {
        // Routes accessible only by users with the 'admin' role
        Route::get('roles', RoleIndex::class)->name('roles.index');
        Route::get('roles/create', RoleCreate::class)->name('roles.create');
        Route::get('roles/{id}/edit', RoleEdit::class)->name('roles.edit');
    });

    Route::get('teacher/list', TeacherList::class)->name('teacher.list');
    Route::get('teacher/{id}/profile/index', TeacherIndex::class)->name('teacher.profile.index');
    Route::get('teacher/{id}/profile/qualification', TeacherQualification::class)->name('teacher.profile.qualification');
    Route::get('teacher/{id}/profile/employment', TeacherEmployment::class)->name('teacher.profile.employment');
    Route::get('teacher/{id}/profile/family', TeacherFamily::class)->name('teacher.profile.family');
    Route::middleware(['permission:create teachers'])->group(function () {
        // Routes accessible only by teachers with 'create teachers' permission
        Route::get('teacher/create', TeacherCreate::class)->name('teacher.create');
        Route::get('teacher/edit', TeacherEdit::class)->name('teacher.edit');
    });

    Route::get('principal/list', PrincipalList::class)->name('principal.list');
    Route::get('principal/create', PrincipalCreate::class)->name('principal.create');
    Route::get('principal/edit', PrincipalEdit::class)->name('principal.edit');
    Route::get('principal/{id}/profile/index', PrincipalIndex::class)->name('principal.profile.index');
    Route::get('principal/{id}/profile/qualification', PrincipalQualification::class)->name('principal.profile.qualification');
    Route::get('principal/{id}/profile/employment', PrincipalEmployment::class)->name('principal.profile.employment');
    Route::get('principal/{id}/profile/family', PrincipalFamily::class)->name('principal.profile.family');




});

require __DIR__.'/auth.php';
