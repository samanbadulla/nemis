<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces_lists')->insert([
            //Provinces
            [
                'province_id' => 'PRO01',
                'province_name' => 'Northern',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO02',
                'province_name' => 'North Western',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO03',
                'province_name' => 'Western',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO04',
                'province_name' => 'North Central',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO05',
                'province_name' => 'Central',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO06',
                'province_name' => 'Sabaragamuwa',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO07',
                'province_name' => 'Eastern',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO08',
                'province_name' => 'Uva',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'province_id' => 'PRO09',
                'province_name' => 'Southern',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
