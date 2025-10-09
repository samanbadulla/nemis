<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationQualificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'qualifications_id' => 'EQ001',
                'rank' => 1,
                'slql' => 'SLQL10',
                'nvql' => null,
                'qualification' => 'Doctoral Degree, MD with Board Certification',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ002',
                'rank' => 2,
                'slql' => 'SLQL9',
                'nvql' => null,
                'qualification' => 'Master of Philosophy, Masters by fulltime research, DM',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ003',
                'rank' => 3,
                'slql' => 'SLQL8',
                'nvql' => null,
                'qualification' => 'Masters with course work and a Research component',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ004',
                'rank' => 4,
                'slql' => 'SLQL7',
                'nvql' => null,
                'qualification' => 'Postgraduate Certificate, Postgraduate Diploma, Masters with coursework',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ005',
                'rank' => 5,
                'slql' => 'SLQL6',
                'nvql' => null,
                'qualification' => 'Honours Bachelors',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ006',
                'rank' => 6,
                'slql' => 'SLQL5',
                'nvql' => 'NVQL7',
                'qualification' => 'Bachelors Degree, Bachelors Double Major Degree',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ007',
                'rank' => 7,
                'slql' => 'SLQL4',
                'nvql' => 'NVQL6',
                'qualification' => 'Higher Diploma',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ008',
                'rank' => 8,
                'slql' => 'SLQL3',
                'nvql' => 'NVQL5',
                'qualification' => 'Diploma',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ009',
                'rank' => 9,
                'slql' => 'SLQL2',
                'nvql' => 'NVQL4',
                'qualification' => 'Advanced Certificate',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'qualifications_id' => 'EQ010',
                'rank' => 10,
                'slql' => 'SLQL1',
                'nvql' => 'NVQL2',
                'qualification' => 'Certificate',
                'active_status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('education_qualifications')->insert($data);
    }
}
