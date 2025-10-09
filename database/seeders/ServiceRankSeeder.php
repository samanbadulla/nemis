<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRank;
use Carbon\Carbon;

class ServiceRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $ranks = [
            // Sri Lanka Teacher Service(SLTS)
            [
                'rank_id'   => 'RANK001',
                'service_id'=> 'SER001', // Education Service
                'rank_name' => '3-II',
                'description' => 'Entry-level rank for Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK002',
                'service_id'=> 'SER001',
                'rank_name' => '3-I(a)',
                'description' => 'Entry-level rank for Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK003',
                'service_id'=> 'SER001',
                'rank_name' => '3-I(b)',
                'description' => 'Entry-level rank in Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK004',
                'service_id'=> 'SER001',
                'rank_name' => '3-I(c)',
                'description' => 'Entry-level rank in Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK005',
                'service_id'=> 'SER001',
                'rank_name' => '2-II',
                'description' => 'Second rank in Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK006',
                'service_id'=> 'SER001',
                'rank_name' => '2-I',
                'description' => 'Second rank in Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK007',
                'service_id'=> 'SER001',
                'rank_name' => '1',
                'description' => 'Top rank in Teacher Service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],

            // Sri Lanka Teacher Educator Service(SLTES)
            [
                'rank_id'   => 'RANK008',
                'service_id'=> 'SER002',
                'rank_name' => 'I',
                'description' => 'Top rank in Teacher Educator service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],

            // Sri Lanka Teacher Advisor Service(SLTAS)
            [
                'rank_id'   => 'RANK009',
                'service_id'=> 'SER003',
                'rank_name' => 'I',
                'description' => 'Top rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],

            // Sri Lanka Principal Service(SLPS)
            [
                'rank_id'   => 'RANK010',
                'service_id'=> 'SER004',
                'rank_name' => 'III',
                'description' => 'Entry-level rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK011',
                'service_id'=> 'SER004',
                'rank_name' => 'II',
                'description' => 'Second rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK012',
                'service_id'=> 'SER004',
                'rank_name' => 'I',
                'description' => 'Top rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],

            // Sri Lanka education Administrative Service
            [
                'rank_id'   => 'RANK013',
                'service_id'=> 'SER005',
                'rank_name' => 'III',
                'description' => 'Entry-level rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK014',
                'service_id'=> 'SER005',
                'rank_name' => 'II',
                'description' => 'Second rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK015',
                'service_id'=> 'SER005',
                'rank_name' => 'I',
                'description' => 'Top rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],

            // Sri Lanka Administrative Service(SLAS)
            [
                'rank_id'   => 'RANK016',
                'service_id'=> 'SER006',
                'rank_name' => 'III',
                'description' => 'Entry-level rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK017',
                'service_id'=> 'SER006',
                'rank_name' => 'II',
                'description' => 'Second rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'rank_id'   => 'RANK018',
                'service_id'=> 'SER006',
                'rank_name' => 'I',
                'description' => 'Top rank in administrative service',
                'active_status' => '1',
                'created_at' => $now, 
                'updated_at' => $now
            ],
        ];

        foreach ($ranks as $rank) {
            ServiceRank::updateOrCreate(
                ['rank_id' => $rank['rank_id']], // check uniqueness
                $rank
            );
        }
    }
}
