<?php

use Illuminate\Database\Seeder;
use App\Schedule;
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
            'scheduleid'           => '2694c946-b262-3a56-8b71-9c5f529f778f',
            'year_number'          => 2018,
            'week_number'       => 1,
            'startdate' => '2018-01-01',
            'enddate'        => '2018-01-06',
            'createdby' => 1,
            'isActive' => 0
            ],
            [
                'scheduleid'           => 'bd806508-2c66-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 2,
                'startdate' => '2018-01-07',
                'enddate'        => '2018-01-13',
                'createdby' => 1,
                'isActive' => 0
            ],
            [
                'scheduleid'           => 'd6c665c6-2c66-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 3,
                'startdate' => '2018-01-14',
                'enddate'        => '2018-01-20',
                'createdby' => 1,
                'isActive' => 0
            ],
            [
                'scheduleid'           => 'f877fc5c-2c66-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 4,
                'startdate' => '2018-01-21',
                'enddate'        => '2018-01-27',
                'createdby' => 1,
                'isActive' => 0
            ],
            [
                'scheduleid'           => '09261124-2c67-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 5,
                'startdate' => '2018-01-28',
                'enddate'        => '2018-02-03',
                'createdby' => 1,
                'isActive' => 0
            ],
            [
                'scheduleid'           => '22a2cc3c-2c67-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 6,
                'startdate' => '2018-02-04',
                'enddate'        => '2018-02-10',
                'createdby' => 1,
                'isActive' => 0
            ],
            [
                'scheduleid'           => '4095aeb2-2c67-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 7,
                'startdate' => '2018-02-11',
                'enddate'        => '2018-02-17',
                'createdby' => 1,
                'isActive' => 0
            ]
            ,
            [
                'scheduleid'           => '4f86e33c-2c67-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 8,
                'startdate' => '2018-02-18',
                'enddate'        => '2018-02-24',
                'createdby' => 1,
                'isActive' => 0
            ]
            ,
            [
                'scheduleid'           => '60fe8638-2c67-11e8-b467-0ed5f89f718b',
                'year_number'          => 2018,
                'week_number'       => 9,
                'startdate' => '2018-02-25',
                'enddate'        => '2018-03-03',
                'createdby' => 1,
                'isActive' => 0
            ]
            ,
            [
                'scheduleid'           => '9bff3bc4-2c67-11e8-b467-0ed5f89f718b',
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
