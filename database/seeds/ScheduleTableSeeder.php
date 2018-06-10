<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Uuid;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert(
            [
            'scheduleid'           => Uuid::uuid(),
            'year_number'          => 2018,
            'week_number'       => 1,
            'startdate' => '2018-01-01',
            'enddate'        => '2018-01-06',
            'createdby' => 1,
            'isActive' => 0
            ]);
        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 2,
                'startdate' => '2018-01-07',
                'enddate'        => '2018-01-13',
                'createdby' => 1,
                'isActive' => 0
            ]);
        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 3,
                'startdate' => '2018-01-14',
                'enddate'        => '2018-01-20',
                'createdby' => 1,
                'isActive' => 0
            ]
        );
        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 4,
                'startdate' => '2018-01-21',
                'enddate'        => '2018-01-27',
                'createdby' => 1,
                'isActive' => 0
            ]
            );

        DB::table('schedules')->insert(

                [
                    'scheduleid'           => Uuid::uuid(),
                    'year_number'          => 2018,
                    'week_number'       => 5,
                    'startdate' => '2018-01-28',
                    'enddate'        => '2018-02-03',
                    'createdby' => 1,
                    'isActive' => 0
                ]

            );

        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 6,
                'startdate' => '2018-02-04',
                'enddate'        => '2018-02-10',
                'createdby' => 1,
                'isActive' => 0
            ]
        );

        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 7,
                'startdate' => '2018-02-11',
                'enddate'        => '2018-02-17',
                'createdby' => 1,
                'isActive' => 0
            ]
        );

        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 8,
                'startdate' => '2018-02-18',
                'enddate'        => '2018-02-24',
                'createdby' => 1,
                'isActive' => 0
            ]
        );

        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 9,
                'startdate' => '2018-02-25',
                'enddate'        => '2018-03-03',
                'createdby' => 1,
                'isActive' => 0
            ]
        );


        DB::table('schedules')->insert(
            [
                'scheduleid'           => Uuid::uuid(),
                'year_number'          => 2018,
                'week_number'       => 10,
                'startdate' => '2018-03-04',
                'enddate'        => '2018-04-10',
                'createdby' => 1,
                'isActive' => 0
            ]
        );
    }
}
