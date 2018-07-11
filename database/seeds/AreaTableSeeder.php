<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Uuid;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert(
            [
                'areaid' => Uuid::uuid(),
                'parentareaid' => null,
                'name' => 'Test Area',
                'address' => 'Test Area',
                'city' => 'Test Area',
                'country' => 'Test Area',
                'size' => '2',
                'acquiredDate' => null,
                'status' => 1,
                'updatedby' => 'seeder',
                'createdby' => 'seeder'




            ]
        );

        DB::table('areas')->insert(
            [
                'areaid' => Uuid::uuid(),
                'parentareaid' => null,
                'name' => 'Test Area 2',
                'address' => 'Test Area 2',
                'city' => 'Test Area 2',
                'country' => 'Test Area 2',
                'size' => '2',
                'acquiredDate' => null,
                'status' => 1,
                'updatedby' => 'seeder',
                'createdby' => 'seeder'




            ]
        );
    }
}
