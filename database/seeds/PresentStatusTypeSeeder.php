<?php

use Illuminate\Database\Seeder;
use App\PresentStatusType;

class PresentStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('present_status_types')->insert(
            [
            'typename' => 'Whole Day',
            'hours' => 8.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'AM',
                'hours' => 4.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'PM',
                'hours' => 4.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'AM_1H',
                'hours' => 1.0,
            ]
        );
        DB::table('present_status_types')->insert(
            [
                'typename' => 'AM_2H',
                'hours' => 2.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'AM_3H',
                'hours' => 3.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'PM_1H',
                'hours' => 1.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'PM_2H',
                'hours' => 2.0,
            ]
        );

        DB::table('present_status_types')->insert(
            [
                'typename' => 'PM_3H',
                'hours' => 3.0,
            ]
        );




    }
}
