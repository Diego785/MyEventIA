<?php

namespace App\Http\Livewire\Organizer;

use App\Models\Event;
use App\Models\EventPayment;
use App\Models\Photographer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPhotographers extends Component
{
    public $status = 'Pendiente', $amount, $description, $photographer, $photographer_id, $organizer, $event = 1;
    public $open = false;

    protected $rules = [
        'amount' => 'required',
        'description' => 'required',

    ];
    protected $messages = [
        'amount.required' => 'El campo Costo es obligatorio.',
        'description.required' => 'El campo Descripción es obligatorio.',

    ];


    public function mount()
    {
        $this->organizer = Auth::user()->name;
    }

    public function request_open($photographer_selected)
    {
        $this->photographer_id = $photographer_selected;
        $this->photographer = Photographer::find($photographer_selected)->user->name;

        $this->open = true;
    }

    public function save_request()
    {
        $this->validate();
        $event_payment = EventPayment::create([
            'amount' => $this->amount,
            'description' => $this->description,
            'photographer_id' => $this->photographer_id,
            'organizer_id' => Auth::user()->organizer->id,
            'event_id' => $this->event,
        ]);
        $this->reset('open', 'amount', 'description');

    }

    public function render()
    {

        $photographers = Photographer::all();
        $events = Event::where('organizer_id', Auth::user()->organizer->id)->get();
        return view('livewire.organizer.show-photographers', compact('photographers', 'events'));
    }
}
