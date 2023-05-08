<?php

namespace App\Http\Livewire\System;

use Livewire\Component;

class RegisteringTime extends Component
{
    public $time, $amount;
    public function render()
    {
        return view('livewire.system.registering-time');
    }
}
