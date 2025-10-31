<?php

use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Sleas\SleasList;
use App\Livewire\Sltas\SltasList;
use App\Livewire\Sltes\SltesList;
use App\Livewire\Users\UserIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Settings\Password;
use App\Livewire\Sleas\SleasCreate;

use App\Livewire\Sltas\SltasCreate;
use App\Livewire\Sltes\SltesCreate;
use App\Livewire\Settings\Appearance;

use App\Livewire\Teacher\TeacherEdit;
use App\Livewire\Teacher\TeacherList;
use Illuminate\Support\Facades\Route;

use App\Livewire\Offices\OfficesIndex;
use App\Http\Controllers\pdf\TeacherId;

use App\Livewire\Teacher\TeacherCreate;
use App\Livewire\Teacher\TeacherProfile;

use App\Livewire\Principal\PrincipalEdit;

use App\Livewire\Principal\PrincipalList;
use App\Livewire\Sleas\Profile\SleasIndex;
use App\Livewire\Principal\PrincipalCreate;
use App\Livewire\Sleas\Profile\SleasFamily;
use App\Livewire\Offices\Deo\DeoOfficesList;
use App\Livewire\Offices\Moe\MoeOfficesList;
use App\Livewire\Offices\Peo\PeoOfficesList;
use App\Livewire\Offices\Zeo\ZeoOfficesList;
use App\Http\Controllers\DashboardController;
use App\Livewire\Offices\Deo\DeoOfficesCreate;
use App\Livewire\Offices\Deo\Profile\DeoStaff;
use App\Livewire\Offices\Moe\MoeOfficesCreate;
use App\Livewire\Offices\Moe\Profile\MoeStaff;
use App\Livewire\Offices\Peo\PeoOfficesCreate;
use App\Livewire\Offices\Peo\Profile\PeoStaff;
use App\Livewire\Offices\Pmoe\PmoeOfficesList;
use App\Livewire\Offices\Zeo\Profile\ZeoStaff;
use App\Livewire\Offices\Zeo\ZeoOfficesCreate;
use App\Livewire\Teacher\Profile\TeacherIndex;
use App\Livewire\Offices\Deo\DeoOfficesProfile;
use App\Livewire\Offices\Moe\MoeOfficesProfile;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Offices\Peo\PeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZonaleOfficeByPeo;
use App\Livewire\Sleas\Profile\SleasEmployment;
use App\Livewire\Teacher\Profile\TeacherFamily;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Institutions\InstitutionsIndex;
use App\Livewire\Offices\Deo\Profile\DeoProfile;
use App\Livewire\Offices\Moe\Profile\Moeprofile;
use App\Livewire\Offices\Peo\Profile\PeoProfile;
use App\Livewire\Offices\Pmoe\PmoeOfficesCreate;
use App\Livewire\Offices\Pmoe\Profile\PmoeStaff;
use App\Livewire\Offices\Zeo\Profile\ZeoProfile;
use App\Livewire\Institutions\InstitutionsCreate;
use App\Livewire\Offices\Deo\Profile\DeoOverview;
use App\Livewire\Offices\Moe\Profile\MoeOverview;
use App\Livewire\Offices\Peo\Profile\PeoOverview;
use App\Livewire\Offices\Pmoe\PmoeOfficesProfile;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Offices\Zeo\Profile\ZeoOverview;
use App\Livewire\Offices\Pmoe\Profile\PmoeProfile;
use App\Livewire\Principal\Profile\PrincipalIndex;
use App\Livewire\Sleas\Profile\SleasQualification;
use App\Livewire\Offices\Pmoe\Profile\PmoeOverview;
use App\Livewire\Principal\Profile\PrincipalFamily;
use App\Livewire\Teacher\Profile\TeacherEmployment;
use App\Livewire\Offices\Deo\DivisionalOfficeByZone;
use App\Livewire\Offices\Peo\ProvincialOfficeByPmoe;
use App\Livewire\Teacher\Profile\TeacherQualification;
use App\Livewire\Institutions\Profile\InstitutionStaff;
use App\Livewire\Principal\Profile\PrincipalEmployment;
use App\Livewire\Institutions\Profile\InstitutionsProfile;
use App\Livewire\Principal\Profile\PrincipalQualification;
use App\Livewire\Institutions\Profile\InstitutionsOverview;


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

    Route::get('institutions/{id}/profile/overview', InstitutionsOverview::class)->name('institutions.profile.overview');
    Route::get('institutions/{id}/profile/profile', InstitutionsProfile::class)->name('institutions.profile.profile');
    Route::get('institutions/{id}/profile/staff', InstitutionStaff::class)->name('institutions.profile.staff');


    Route::get('offices/moe/{id}/profile/overview', MoeOverview::class)->name('offices.moe.profile.overview');
    Route::get('offices/moe/{id}/profile/moefprofile', Moeprofile::class)->name('offices.moe.profile.moeprofile');
    Route::get('offices/moe/{id}/profile/staff', MoeStaff::class)->name('offices.moe.profile.staff');
    // Route::get('offices/moe/{id}/profile/staff', MoeStaff::class)->name('offices.moe.profile.staff');
    
    Route::get('offices/pmoe/{id}/profile/overview', PmoeOverview::class)->name('offices.pmoe.profile.overview');
    Route::get('offices/pmoe/{id}/profile/profile', PmoeProfile::class)->name('offices.pmoe.profile.profile');
    Route::get('offices/pmoe/{id}/profile/staff', PmoeStaff::class)->name('offices.pmoe.profile.staff');

    
    Route::get('offices/peo/{id}/profile/overview', PeoOverview::class)->name('offices.peo.profile.overview');
    Route::get('offices/peo/{id}/profile/profile',  PeoProfile::class)->name('offices.peo.profile.profile');
    Route::get('offices/peo/{id}/profile/staff',    PeoStaff::class)->name('offices.peo.profile.staff');
    
    Route::get('offices/zeo/{id}/profile/overview', ZeoOverview::class)->name('offices.zeo.profile.overview');
    Route::get('offices/zeo/{id}/profile/profile',  ZeoProfile::class)->name('offices.zeo.profile.profile');
    Route::get('offices/zeo/{id}/profile/staff',    ZeoStaff::class)->name('offices.zeo.profile.staff');
  
    Route::get('offices/deo/{id}/profile/overview', DeoOverview::class)->name('offices.deo.profile.overview');
    Route::get('offices/deo/{id}/profile/profile',  DeoProfile::class)->name('offices.deo.profile.profile');
    Route::get('offices/deo/{id}/profile/staff',    DeoStaff::class)->name('offices.deo.profile.staff');
     

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
    Route::get('/pdf/{id}', [TeacherId::class, 'generatePDF'])->name('teacher.id.pdf');

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

    Route::get('sleas/list', SleasList::class)->name('sleas.list');
    Route::get('sleas/create', SleasCreate::class)->name('sleas.create');
    Route::get('sleas/{id}/profile/index', SleasIndex::class)->name('sleas.profile.index');
    Route::get('sleas/{id}/profile/qualification', SleasQualification::class)->name('sleas.profile.qualification');
    Route::get('sleas/{id}/profile/employment', SleasEmployment::class)->name('sleas.profile.employment');
    Route::get('sleas/{id}/profile/family', SleasFamily::class)->name('sleas.profile.family');

    Route::get('sltes/list', SltesList::class)->name('sltes.list');
    Route::get('sltes/create', SltesCreate::class)->name('sltes.create');

    Route::get('sltas/list', SltasList::class)->name('sltas.list');
    Route::get('sltas/create', SltasCreate::class)->name('sltas.create');




});

require __DIR__.'/auth.php';
