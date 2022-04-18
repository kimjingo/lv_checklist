<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestButton extends Component
{
    public function render()
    {
        return view('livewire.test-button');
    }
    public function clicked(){
        $this->emit('postAdded', 1, 'jingoo kim');
    }
}
