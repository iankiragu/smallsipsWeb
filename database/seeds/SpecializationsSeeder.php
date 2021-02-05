<?php

use Illuminate\Database\Seeder;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            ['name'=>'Neurology'],
            ['name'=>'Gerontologist'],
            ['name'=>'Obstetrics & Gynaecology'],
            ['name'=>'Anaesthesia & Critical Care'],
            ['name'=>'Emergency Medicine'],
            ['name'=>'Internal Medicine'],
            ['name'=>'Cardiology'],
            ['name'=>'Oncology, Urology'],
            ['name'=>'Dental Sciences'],
            ['name'=>'Neurosurgery'],
            ['name'=>'Pathology'],
        ]);
    }
}
