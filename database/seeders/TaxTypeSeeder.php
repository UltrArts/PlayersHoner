<?php

namespace Database\Seeders;

use App\Models\TaxType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TIPOS DE TRANSAÇÕES
        $types = [
            [
            'type'  => 'Percentual'
            ],
            [
            'type' => 'Montante'
            ]
        ];
        foreach ($types as  $type) {
            TaxType::create($type);
        }
    }
}
