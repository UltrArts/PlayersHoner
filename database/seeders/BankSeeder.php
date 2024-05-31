<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //BANCOS
        $banks = [
            [
            'bank_name'  => 'Access Bank Mozambique S.A.'
            ],
            [
            'bank_name'  => 'Absa Bank Mozambique'
            ],
            [
            'bank_name'  => 'Banco Comercial e de Investimentos (BCI)'
            ],
            [
            'bank_name'  => 'Banco de Investimentos Global (BIG)'
            ],
            [
            'bank_name'  => 'Banco Mercantil e de Investimentos (BMI)'
            ],
            [
            'bank_name'  => 'Banco MAIS'
            ],
            [
            'bank_name'  => 'Banco Moza'
            ],
            [
            'bank_name'  => 'Banco Nacional de Investimentos (BNI)'
            ],
            [
            'bank_name'  => 'Banco Société Générale Moçambique (SGM)'
            ],
            [
            'bank_name'  => 'Banco Terra (BTM)'
            ],
            [
            'bank_name'  => 'Ecobank Mozambique'
            ],
            [
            'bank_name'  => 'First National Bank Mozambique'
            ],
            [
            'bank_name'  => 'First Capital Bank Mozambique (FCB)'
            ],
            [
            'bank_name'  => 'Letshego Bank Mozambique'
            ],
            [
            'bank_name'  => 'Millennium BIM (BIM)'
            ],
            [
            'bank_name'  => 'Nedbank Mozambique (NBM)'
            ],
            [
            'bank_name'  => 'Opportunity Bank Mozambique (OBM)'
            ],
            [
            'bank_name'  => 'Socremo Microfinance Bank'
            ],
            [
            'bank_name'  => 'Standard Bank'
            ],
            [
            'bank_name'  => 'United Bank for Africa'
            ]
        ];
        
        foreach ($banks as  $bank) {
            Bank::create($bank);
        }
    }
}
