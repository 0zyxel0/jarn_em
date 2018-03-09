<?php

use Illuminate\Database\Seeder;


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
            'partyid' => '',
            'givenname' => '',
            'familyname' => bcrypt('123456'),
            'middlename' => '',
            'birthday' => '',
            'password'=> '',
            'age' => '',
            'gender' => '',
            'religion'=> '',
            'address' => '',
            'contactnumber' => '',
             'civilstatus' => '',
            'comments' => '',
            'status' => '',
             'religion' => '',
            'startdate' => '',
            'enddate' => '',
             'religion' => '',
            'isActive' => '',
            'updatedby' => ''
        ]);
    }
}
