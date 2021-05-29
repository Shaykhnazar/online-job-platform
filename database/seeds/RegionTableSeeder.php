<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::insert([
            ['name' => 'Qoraqalpog‘iston Respublikasi'],
            ['name' => 'Andijon viloyati'],
            ['name' => 'Buxoro viloyati'],
            ['name' => 'Jizzax viloyati'],
            ['name' => 'Qashqadaryo viloyati'],
            ['name' => 'Navoiy viloyati'],
            ['name' => 'Namangan viloyati'],
            ['name' => 'Samarqand viloyati'],
            ['name' => 'Surxandaryo viloyati'],
            ['name' => 'Sirdaryo viloyati'],
            ['name' => 'Toshkent viloyati'],
            ['name' => 'Farg‘ona viloyati'],
            ['name' => 'Xorazm viloyati'],
            ['name' => 'Toshkent shahri']
        ]);
    }
}
