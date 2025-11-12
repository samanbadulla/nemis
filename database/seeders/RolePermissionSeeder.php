<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [

            //Sync permision
            'view dashboard', 'view students', 'view attendance', 'manage attendance', 'view exam results', 'manage term tests', 'manage resources', 'allocate resources',
            'view resource allocation',

            // Teacher Management
            'view teachers', 'create teachers', 'edit teachers', 'delete teachers',
            'view teachers list', 'view teachers profile genaral', 'view teachers profile qualification', 'view teachers profile employment', 'view teachers profile family',
            'view teachers profile id', 'view teachers profile pdf', 'teacher bulk upload',
            'teacher personal and cultural edit', 'teacher health information edit', 'teacher contact and address edit',
            'teacher qualification add', 'teacher qualification delete',
            'teacher current employerment edit', 'teacher first employerment edit', 'teacher previous record add', 'teacher previous record delete',

            // Principal Management
            'view principals list', 'view principal profile genaral', 'view principal profile qualification', 'view principal profile employment', 'view principal profile family',
            'create principals', 'edit principals',

            // SLEAS Management
            'view sleas list',

            // SLTES Managemnt
            'view sltes list',

            // SLTAS Management
            'view sltas list',

            // Users Management
            'view users list', 'user edit', 'create user', 'user password reset', 'user status change', 'user delete',

            // Institution Management
            'view institutions list', 'create institution', 'institution edit', 'view institutions profile', 'view institutions profile overview', 'view institutions profile profile', 'view institutions profile staff',
            'institution basic information edit', 'institution contact details edit', 'institution location and administration edit', 'institution mission and vision edit',

            // Apoinment Subject Management
            'view apoinment subject list', 'create apoinment subject', 'apoinment subject edit', 'apoinment subject delete', 'view apoinment subject',

            // Teaching Subject Managemnt
            'view teaching subject list', 'create teaching subject', 'teaching subject edit', 'teaching subject delete', 'view teaching subject',

            // Office Mangement
            'view moe list', 'view pmoe list', 'view peo list', 'view zeo list', 'view deo list',
            'create moe office', 'create pmoe office', 'create peo office', 'create zeo office', 'create deo office',
            'view moe profile overview', 'view pmoe profile overview', 'view peo profile overview', 'view zeo profile overview', 'view deo profile overview',
            'moe office edit', 'pmoe office edit', 'peo office edit', 'zeo office edit', 'deo office edit',
            'moe office delete', 'pmoe office delete', 'peo office delete', 'zeo office delete', 'deo office delete',






        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Super Admin role and give all permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Create Teacher role and assign specific permissions
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $teacherRole->syncPermissions(['view dashboard', 'view students', 'view teachers', 'view attendance']);

        // Create principal role and assign specific permissions
        $principalRole = Role::firstOrCreate(['name' => 'principal']);
        $principalRole->syncPermissions([
            'view dashboard',
            'view students',
            'view teachers',
            'view attendance',
            'manage attendance',
            'view exam results',
            'manage term tests',
            'manage resources',
            'allocate resources',
            'view resource allocation'
        ]);
    }
}
