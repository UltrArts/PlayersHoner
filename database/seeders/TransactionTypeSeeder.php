<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //TIPOS DE TRANSAÇÕES
         $types = [
            [
            'type'  => 'credit'
            ],
            [
            'type' => 'debit'
            ]
        ];
        foreach ($types as  $type) {
            TransactionType::create($type);
        }
    }
}
