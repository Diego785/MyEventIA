<?php

namespace App\Http\Livewire\System;

use App\Models\Photographer;
use App\Models\User;
use App\Models\Suscription;
use Livewire\Component;

class RegisteringData extends Component
{
    public $name, $email, $password, $photo, $telephone, $carnet, $amount, $suscription;

    protected $rules = [
        'name' => 'required',
        'telephone' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'carnet' => 'required',
        'suscription' => 'required',
    ];
    protected $messages = [
        'name.required' => 'El campo Nombre es obligatorio.',
        'telephone.required' => 'El campo Celular es obligatorio.',
        'email.required' => 'El campo Email es obligatorio.',
        'email.unique' => 'El Email ya está registrado.',
        'password.required' => 'El campo Password es obligatorio.',
        'carnet.required' => 'El campo Carnet es obligatorio.',
        'suscription.required' => 'La Suscripción es obligatoria.',
    ];

    public function mount($amount)
    {
        $this->amount = $amount;
    }

    public function savePhotographerUser()
    {
        $this->suscription = Suscription::latest()->first();
        if($this->suscription->photographer_id != null ){
            $this->suscription = null;
        }
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $photographer = Photographer::create([
            'telephone' => $this->telephone,
            'carnet' => $this->carnet,
            'photo' => $this->photo,
            'user_id' => $user->id,
        ]);
        $this->suscription->photographer_id = $photographer->id;
        $this->suscription->save();
        return redirect()->route('photographer.my-events');
    }

    public function render()
    {

        return view('livewire.system.registering-data');
    }
}
