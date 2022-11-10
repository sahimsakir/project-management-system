<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'workshop_name' => 'Workshop 1',
                'workshop_details' => 'lorem ipsum',
                'status_id' => '1',
                'user_id' => '1',
            ],
            [
                'workshop_name' => 'Workshop 2',
                'workshop_details' => 'lorem ipsum 2',
                'status_id' => '1',
                'user_id' => '1',
            ],
            [
                'workshop_name' => 'Workshop 3',
                'workshop_details' => 'lorem ipsum 3',
                'status_id' => '2',
                'user_id' => '1',
            ],
            [
                'workshop_name' => 'Workshop 4',
                'workshop_details' => 'lorem ipsum 4',
                'status_id' => '2',
                'user_id' => '2',
            ],
            [
                'workshop_name' => 'Workshop 5',
                'workshop_details' => 'lorem ipsum 5',
                'status_id' => '1',
                'user_id' => '2',
            ],
        ];
        Workshop::insert($data);
    }
}
