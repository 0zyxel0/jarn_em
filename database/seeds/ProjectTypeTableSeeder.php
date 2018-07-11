<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Uuid;

class ProjectTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(
            [
                'projectid' => Uuid::uuid(),
                'project_name' => 'CLEANING',
                'project_code' => 'CLN',
                'rate' => '3',
                'updatedby' => 'seeder'
            ]
        );

        DB::table('projects')->insert(
            [
                'projectid' => Uuid::uuid(),
                'project_name' => 'HARVEST',
                'project_code' => 'HRST',
                'rate' => '2.5',
                'updatedby' => 'seeder'
            ]
        );


        DB::table('projects')->insert(
            [
                'projectid' => Uuid::uuid(),
                'project_name' => 'CUTTING',
                'project_code' => 'CTNG',
                'rate' => '1.5',
                'updatedby' => 'seeder'
            ]
        );
    }
}
