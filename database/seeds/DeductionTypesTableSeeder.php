<?php

use Illuminate\Database\Seeder;

class DeductionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deduction_types')->insert(
            [
                'name' => 'Rice Deduction',
                'createdby' => 'seeder'
            ]
        );
        DB::table('deduction_types')->insert(
            [
                'name' => 'Corn Deduction',
                'createdby' => 'seeder'
            ]
        );
        DB::table('deduction_types')->insert(
            [
                'name' => 'Materials Deduction',
                'createdby' => 'seeder'
            ]
        );
        DB::table('deduction_types')->insert(
            [
                'name' => 'Paluwagan Deduction',
                'createdby' => 'seeder'
            ]
        );

    }
}
