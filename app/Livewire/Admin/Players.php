<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Players extends Component
{
    public $is_new, $filter = "all", $filterOpt = ['all', 'active', 'retired', 'preregiter'];
    public function render()
    {
        return view('livewire.admin.players');
    }

    public function setIsNew()
    {
        $this->is_new = !$this->is_new;
    }

    public function filtering($item)
    {
    //  dd(); 
    $this->filter = $item;
    }
}
