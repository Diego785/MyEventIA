<?php

namespace App\Http\Livewire\System;

use App\Models\Photographer;
use Livewire\Component;
use App\Models\Suscription;
use Database\Seeders\PhotographerSeeder;

class RegisteringPayment extends Component
{
    public $statusSuscription;
    public $suscription = 1, $status, $amount, $time;
    public $name, $email, $password, $carnet;
    protected $listeners = ['saveSuscription'];


    protected $rules = [
        // 'name' => 'required',
        // 'email' => 'required|unique:users',
        // 'password' => 'required',
        'carnet' => 'required',
    ];
    protected $messages = [
        // 'name.required' => 'El campo Nombre es obligatorio.',
        // 'email.required' => 'El campo Email es obligatorio.',
        // 'email.unique' => 'El Email ya está registrado.',
        // 'password.required' => 'El campo Password es obligatorio.',
        'carnet.required' => 'El campo Carnet es obligatorio.',
    ];

    public function mount($amount, $namePh, $emailPh, $passwordPh, $carnetPh)
    {
        if (Suscription::latest()->first() == null) {
            $this->suscription = 1;
        } else {
            $this->suscription = Suscription::latest()->first()->id + 1;
        }

        $this->amount = $amount;
        if ($this->amount == 10)
            $this->time = "1 mes";
        else 
        if ($this->amount == 19)
            $this->time = "6 meses";
        else 
        if ($this->amount == 40)
            $this->time = "1 año";
    }

    public function saveSuscription()
    {
        // $photographer = Photographer::create([
        //     'telephone' =>
        // ]);
        $statusSuscription = Suscription::create([
            'time' => $this->time,
            'amount' => $this->amount,
            // 'photographer_id' => Photographer::latest()->first()->id + 1,
        ]);
    }



    public function render()
    {

        return view('livewire.system.registering-payment');
    }
}
