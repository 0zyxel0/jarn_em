<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'partyid' => '9fae38b1-d7e8-383c-a69f-59cf636bd34b',
            'givenname' => 'Kimberly',
            'familyname' => 'Eversole',
            'middlename' => 'Sarah',
            'birthday' => '1963-01-18',
            'age' => '55',
            'gender' => 'Female',
            'religion'=> '',
            'address' => 'Vidalia, Georgia(GA), 30474',
            'contactnumber' => '912-244-7227',
             'email'=>'triston.bergstr@hotmail.com',
             'civilstatus' => 'Single',
            'comments' => '',
            'status' => 'Contractual',
             'religion' => '',
            'startdate' => '2018-03-22',
            'enddate' => null,
             'religion' => '',
            'isActive' => '1',
            'updatedby' => '1'
        ]);
    }
}
