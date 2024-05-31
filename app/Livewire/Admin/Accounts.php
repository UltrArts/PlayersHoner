<?php

namespace App\Livewire\Admin;
use App\Models\{ Bank, TaxType} ;

use Livewire\Component;

class Accounts extends Component
{
    public $is_new, 
            $filter = "all", 
            $filterOpt = ['all', 'active', 'retired', 'preregiter'],
            $banks, $bank,
            $tax_types, $tax_type;


    public function setIsNew()
    {
        $this->is_new = !$this->is_new;
    }


    public function render()
    {
        $this->banks = Bank::get();
        $this->tax_types = TaxType::get();
        return view('livewire.admin.accounts');
    }
}
