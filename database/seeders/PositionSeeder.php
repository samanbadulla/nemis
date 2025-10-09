<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'position_id'   => 'POS001',
                'service_id'    => 'SER001',
                'position_name' => 'Teacher',
                'description'   => 'Responsible for teaching and student development',
                'active_status' => '1',
            ],
            [
                'position_id'   => 'POS002',
                'service_id'    => 'SER001',
                'position_name' => 'Principal',
                'description'   => 'Head of the school, responsible for administration',
                'active_status' => '1',
            ],
            [
                'position_id'   => 'POS003',
                'service_id'    => 'SER005',
                'position_name' => 'Admin Officer',
                'description'   => 'Handles office administration and clerical duties',
                'active_status' => '1',
            ],
        ];

        foreach ($positions as $pos) {
            Position::updateOrCreate(
                ['position_id' => $pos['position_id']], // unique check
                $pos
            );
        }
    }
}
