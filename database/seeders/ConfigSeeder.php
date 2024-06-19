<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         //CRIANDO ROLES
         Config::create([
             'critical_balance' =>  1000,
             'payment_day'      =>  10,
             'min_value'        =>  1000,
         ]);
 

    }
}
