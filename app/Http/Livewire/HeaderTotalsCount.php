<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderTotalsCount extends Component
{
    public $checklist_group_id;
    public function render()
    {
        return view('livewire.header-totals-count');
    }
}
