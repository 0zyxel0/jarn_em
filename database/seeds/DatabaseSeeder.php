<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);
        //$this->call(RolesTableSeeder::class);
       // $this->call(EmployeeTableSeeder::class);
       // $this->call('EmployeeTableSeeder');
        $this->call(PresentStatusTypeSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(DeductionTypesTableSeeder::class);
        $this->call(ProjectTypeTableSeeder::class);
        $this->call(AreaTableSeeder::class);
    }
}
