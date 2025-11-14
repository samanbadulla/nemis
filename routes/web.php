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
use App\Http\Controllers\Pdf\TeacherId;

use App\Livewire\Teacher\TeacherCreate;
use App\Livewire\Teacher\TeacherProfile;

use App\Livewire\Principal\PrincipalEdit;

use App\Livewire\Principal\PrincipalList;
use App\Livewire\Sleas\Profile\SleasIndex;
use App\Livewire\Sltas\Profile\SltasIndex;
use App\Livewire\Sltes\Profile\SltesIndex;
use App\Livewire\Principal\PrincipalCreate;
use App\Livewire\Sleas\Profile\SleasFamily;
use App\Livewire\Sltas\Profile\SltasFamily;
use App\Livewire\Sltes\Profile\SltesFamily;
use App\Livewire\Offices\Deo\DeoOfficesList;
use App\Livewire\Offices\Moe\MoeOfficesList;
use App\Livewire\Offices\Peo\PeoOfficesList;
use App\Livewire\Offices\Zeo\ZeoOfficesList;
use App\Http\Controllers\DashboardController;
use App\Livewire\MainTables\MainTablesGender;
use App\Livewire\Offices\Deo\DeoOfficesCreate;
use App\Livewire\Offices\Deo\Profile\DeoStaff;
use App\Livewire\Offices\Moe\MoeOfficesCreate;
use App\Livewire\Offices\Moe\Profile\MoeStaff;
use App\Livewire\Offices\Peo\PeoOfficesCreate;
use App\Livewire\Offices\Peo\Profile\PeoStaff;
use App\Livewire\Offices\Pmoe\PmoeOfficesList;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Offices\Zeo\Profile\ZeoStaff;
use App\Livewire\Offices\Zeo\ZeoOfficesCreate;
use App\Livewire\MainTables\MainTablesCityList;
use App\Livewire\MainTables\MainTablesDistrict;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\MainTables\MainTablesDSOffice;
use App\Livewire\MainTables\MainTablesOverview;
use App\Livewire\Offices\Deo\DeoOfficesProfile;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Offices\Moe\MoeOfficesProfile;
use App\Livewire\Offices\Peo\PeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZeoOfficesProfile;
use App\Livewire\Offices\Zeo\ZonaleOfficeByPeo;
use App\Livewire\Sleas\Profile\SleasEmployment;
use App\Livewire\Sltas\Profile\SltasEmployment;
//use App\Livewire\Institutions\InstitutionsProfile;
use App\Livewire\Sltes\Profile\SltesEmployment;
use App\Livewire\Subjects\ApointedSubjectIndex;
use App\Livewire\Subjects\TeachingSubjectIndex;
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
use App\Livewire\Offices\Zeo\Profile\ZeoOverview;
use App\Http\Controllers\Auth\OIDCLoginController;
use App\Livewire\MainTables\MainTablesAuthorities;
use App\Livewire\MainTables\MainTablesBloodGroups;
use App\Livewire\MainTables\MainTablesCivilStatus;
use App\Livewire\MainTables\MainTablesEthnicities;
use App\Livewire\Offices\Pmoe\Profile\PmoeProfile;
use App\Livewire\Principal\Profile\PrincipalIndex;
use App\Livewire\Sleas\Profile\SleasQualification;
use App\Livewire\Sltas\Profile\SltasQualification;
use App\Livewire\Sltes\Profile\SltesQualification;
use App\Livewire\Offices\Pmoe\Profile\PmoeOverview;
use App\Livewire\Principal\Profile\PrincipalFamily;
use App\Livewire\Offices\Deo\DivisionalOfficeByZone;
use App\Livewire\Offices\Peo\ProvincialOfficeByPmoe;
use App\Livewire\Institutions\Profile\InstitutionStaff;
use App\Livewire\Principal\Profile\PrincipalEmployment;
use App\Livewire\Institutions\Profile\InstitutionsProfile;
use App\Livewire\Principal\Profile\PrincipalQualification;
use App\Livewire\Institutions\Profile\InstitutionsOverview;
use App\Livewire\MainTables\MainTablesEducationQualifications;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
    |--------------------------------------------------------------------------
    | OIDC Login / Logout
    |--------------------------------------------------------------------------
    */

Route::get('/oidc-login', [OIDCLoginController::class, 'redirectToProvider'])->name('oidc.login');
Route::get('/auth/callback', [OIDCLoginController::class, 'handleProviderCallback']);
Route::post('/oidc-login', [OIDCLoginController::class, 'logout'])->name('oidc.logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    //Route::get('users', UserIndex::class)->name('users.index');
    //Route::get('users/create', UserCreate::class)->name('users.create');
    //Route::get('users/{id}/edit', UserEdit::class)->name('users.edit');

    Route::get('users/index', UserIndex::class)->name('users.index')->middleware(['permission:view users list']);
    Route::get('users/{id}/edit', UserEdit::class)->name('users.edit')->middleware(['permission:user edit']);
    Route::get('users/create', UserCreate::class)->name('users.create')->middleware(['permission:create user']);

    Route::get('institutions', InstitutionsIndex::class)->name('institutions.index')->middleware(['permission:view institutions list']);
    Route::get('institutions/create', InstitutionsCreate::class)->name('institutions.create')->middleware(['permission:create institution']);
    Route::get('institutions/{id}/profile', InstitutionsProfile::class)->name('institutions.profile')->middleware(['permission:view institutions profile']);

    Route::get('institutions/{id}/profile/overview', InstitutionsOverview::class)->name('institutions.profile.overview')->middleware(['permission:view institutions profile overview']);
    Route::get('institutions/{id}/profile/profile', InstitutionsProfile::class)->name('institutions.profile.profile')->middleware(['permission:view institutions profile profile']);
    Route::get('institutions/{id}/profile/staff', InstitutionStaff::class)->name('institutions.profile.staff')->middleware(['permission:view institutions profile staff']);


    Route::get('offices/moe/{id}/profile/overview', MoeOverview::class)->name('offices.moe.profile.overview')->middleware(['permission:view moe profile overview']);
    Route::get('offices/moe/{id}/profile/moefprofile', Moeprofile::class)->name('offices.moe.profile.moeprofile');
    Route::get('offices/moe/{id}/profile/staff', MoeStaff::class)->name('offices.moe.profile.staff');
    // Route::get('offices/moe/{id}/profile/staff', MoeStaff::class)->name('offices.moe.profile.staff');

    Route::get('offices/pmoe/{id}/profile/overview', PmoeOverview::class)->name('offices.pmoe.profile.overview')->middleware(['permission:view pmoe profile overview']);
    Route::get('offices/pmoe/{id}/profile/profile', PmoeProfile::class)->name('offices.pmoe.profile.profile');
    Route::get('offices/pmoe/{id}/profile/staff', PmoeStaff::class)->name('offices.pmoe.profile.staff');


    Route::get('offices/peo/{id}/profile/overview', PeoOverview::class)->name('offices.peo.profile.overview')->middleware(['permission:view peo profile overview']);
    Route::get('offices/peo/{id}/profile/profile',  PeoProfile::class)->name('offices.peo.profile.profile');
    Route::get('offices/peo/{id}/profile/staff',    PeoStaff::class)->name('offices.peo.profile.staff');

    Route::get('offices/zeo/{id}/profile/overview', ZeoOverview::class)->name('offices.zeo.profile.overview')->middleware(['permission:view zeo profile overview']);
    Route::get('offices/zeo/{id}/profile/profile',  ZeoProfile::class)->name('offices.zeo.profile.profile');
    Route::get('offices/zeo/{id}/profile/staff',    ZeoStaff::class)->name('offices.zeo.profile.staff');

    Route::get('offices/deo/{id}/profile/overview', DeoOverview::class)->name('offices.deo.profile.overview')->middleware(['permission:view deo profile overview']);
    Route::get('offices/deo/{id}/profile/profile',  DeoProfile::class)->name('offices.deo.profile.profile');
    Route::get('offices/deo/{id}/profile/staff',    DeoStaff::class)->name('offices.deo.profile.staff');


    Route::get('offices', OfficesIndex::class)->name('offices.index');

    Route::get('offices/deo/list', DeoOfficesList::class)->name('offices.deo.list')->middleware(['permission:view deo list']);
    Route::get('offices/deo/create', DeoOfficesCreate::class)->name('offices.deo.create')->middleware(['permission:create deo office']);
    Route::get('offices/deo/{id}/zone', DivisionalOfficeByZone::class)->name('offices.deo.by-zone')->middleware(['permission:view deo list']);
    Route::get('offices/deo/{id}/profile', DeoOfficesProfile::class)->name('offices.deo.profile');

    Route::get('offices/zeo/list', ZeoOfficesList::class)->name('offices.zeo.list')->middleware(['permission:view zeo list']);
    Route::get('offices/zeo/create', ZeoOfficesCreate::class)->name('offices.zeo.create')->middleware(['permission:create zeo office']);
    Route::get('offices/zeo/{id}/province', ZonaleOfficeByPeo::class)->name('offices.zeo.by-province')->middleware(['permission:view zeo list']);
    Route::get('offices/zeo/{id}/profile', ZeoOfficesProfile::class)->name('offices.zeo.profile');

    Route::get('offices/peo/list/', PeoOfficesList::class)->name('offices.peo.list')->middleware(['permission:view peo list']);
    Route::get('offices/peo/create', PeoOfficesCreate::class)->name('offices.peo.create')->middleware(['permission:create peo office']);
    Route::get('offices/peo/{id}/pmoe', ProvincialOfficeByPmoe::class)->name('offices.peo.by-pmoe')->middleware(['permission:view pmoe list']);
    Route::get('offices/peo/{id}/profile', PeoOfficesProfile::class)->name('offices.peo.profile');

    Route::get('offices/pmoe/list', PmoeOfficesList::class)->name('offices.pmoe.list')->middleware(['permission:view pmoe list']);
    Route::get('offices/pmoe/create', PmoeOfficesCreate::class)->name('offices.pmoe.create')->middleware(['permission:create pmoe office']);
    Route::get('offices/pmoe/{id}/profile', PmoeOfficesProfile::class)->name('offices.pmoe.profile');

    Route::get('offices/moe/list', MoeOfficesList::class)->name('offices.moe.list')->middleware(['permission:view moe list']);
    Route::get('offices/moe/create', MoeOfficesCreate::class)->name('offices.moe.create')->middleware(['permission:create moe office']);
    Route::get('offices/moe/{id}/profile', MoeOfficesProfile::class)->name('offices.moe.profile');

    // In web.php or api.php
    Route::middleware(['role:super admin'])->group(function () {
        // Routes accessible only by users with the 'admin' role
        Route::get('roles', RoleIndex::class)->name('roles.index');
        Route::get('roles/create', RoleCreate::class)->name('roles.create');
        Route::get('roles/{id}/edit', RoleEdit::class)->name('roles.edit');

        // Route::get('main-table/overview', MainTablesOverview::class)->name('main-tables.overview');
        Route::get('main-table/authorities', MainTablesAuthorities::class)->name('main-tables.authorities');
        Route::get('main-table/blood-group', MainTablesBloodGroups::class)->name('main-tables.blood-group');
        Route::get('main-table/city-list', MainTablesCityList::class)->name('main-tables.city-list');
        Route::get('main-table/civil-status', MainTablesCivilStatus::class)->name('main-tables.civil-status');
        Route::get('main-table/district', MainTablesDistrict::class)->name('main-tables.district');
        Route::get('main-table/ds-office', MainTablesDSOffice::class)->name('main-tables.ds-office');
        Route::get('main-table/education-qualifications', MainTablesEducationQualifications::class)->name('main-tables.education-qualifications');
        Route::get('main-table/ethnicities', MainTablesEthnicities::class)->name('main-tables.ethnicities');
        Route::get('main-table/genders', MainTablesGender::class)->name('main-tables.genders');
    });

    Route::get('sleas/list', SleasList::class)->name('sleas.list')->middleware(['permission:view sleas list']);
    Route::get('sleas/create', SleasCreate::class)->name('sleas.create');
    Route::get('sleas/{id}/profile/index', SleasIndex::class)->name('sleas.profile.index');
    Route::get('sleas/{id}/profile/qualification', SleasQualification::class)->name('sleas.profile.qualification');
    Route::get('sleas/{id}/profile/employment', SleasEmployment::class)->name('sleas.profile.employment');
    Route::get('sleas/{id}/profile/family', SleasFamily::class)->name('sleas.profile.family');

    Route::get('sltes/list', SltesList::class)->name('sltes.list')->middleware(['permission:view sltes list']);
    Route::get('sltes/create', SltesCreate::class)->name('sltes.create');
    Route::get('sltes/{id}/profile/index', SltesIndex::class)->name('sltes.profile.index');
    Route::get('sltes/{id}/profile/qualification', SltesQualification::class)->name('sltes.profile.qualification');
    Route::get('sltes/{id}/profile/employment', SltesEmployment::class)->name('sltes.profile.employment');
    Route::get('sltes/{id}/profile/family', SltesFamily::class)->name('sltes.profile.family');

    Route::get('sltas/list', SltasList::class)->name('sltas.list')->middleware(['permission:view sltas list']);
    Route::get('sltas/create', SltasCreate::class)->name('sltas.create');
    Route::get('sltas/{id}/profile/index', SltasIndex::class)->name('sltas.profile.index');
    Route::get('sltas/{id}/profile/qualification', SltasQualification::class)->name('sltas.profile.qualification');
    Route::get('sltas/{id}/profile/employment', SltasEmployment::class)->name('sltas.profile.employment');
    Route::get('sltas/{id}/profile/family', SltasFamily::class)->name('sltas.profile.family');

    Route::get('subjects/apointed-subject', ApointedSubjectIndex::class)->name('subjects.apointed')->middleware(['permission:view apoinment subject list']);
    Route::get('subjects/teaching-subject', TeachingSubjectIndex::class)->name('subjects.teaching')->middleware(['permission:view teaching subject list']);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/teacher.php';
require __DIR__ . '/principal.php';
