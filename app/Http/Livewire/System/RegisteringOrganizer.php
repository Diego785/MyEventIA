<?php

namespace App\Http\Livewire\System;

use App\Models\Organizer;
use App\Models\Suscription;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegisteringOrganizer extends Component
{
    public $name, $carnet, $telephone, $email, $password;

    protected $rules = [
        'name' => 'required',
        'telephone' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'carnet' => 'required',
    ];
    protected $messages = [
        'name.required' => 'El campo Nombre es obligatorio.',
        'telephone.required' => 'El campo Celular es obligatorio.',
        'email.required' => 'El campo Email es obligatorio.',
        'email.unique' => 'El Email ya está registrado.',
        'password.required' => 'El campo Password es obligatorio.',
        'carnet.required' => 'El campo Carnet es obligatorio.',
    ];


    public function register()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            $organizer = Organizer::create([
                'telephone' => $this->telephone,
                'carnet' => $this->carnet,
                'user_id' => $user->id,
            ]);

            $suscription = Suscription::create([
                'time' => 'Indefinido',
                'organizer_id' => $organizer->id,
            ]);

            DB::commit();
            return redirect()->route('photographer.my-events');
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function render()
    {
        return view('livewire.system.registering-organizer');
    }
}
