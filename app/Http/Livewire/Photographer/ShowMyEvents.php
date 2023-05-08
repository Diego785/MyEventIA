<?php

namespace App\Http\Livewire\Photographer;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowMyEvents extends Component
{

    public $name, $description, $address, $date, $start_time, $end_time;
    public $open = false;
    protected $rules = [
        'name' => 'required',
        'date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',

    ];
    protected $messages = [
        'name.required' => 'El campo Nombre es obligatorio.',
        'date.required' => 'El campo Nombre es obligatorio.',
        'start_time.required' => 'El campo Nombre es obligatorio.',
        'end_time.required' => 'El campo Nombre es obligatorio.',

    ];

    public function request_open()
    {

        $this->open = true;
    }

    public function save_event()
    {
        $this->validate();
        $event = Event::create([
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'organizer_id' => Auth::user()->organizer->id,
        ]);
        $this->reset('open', 'name', 'description', 'address', 'date', 'start_time', 'end_time');
    }

    public function render()
    {
        if (Auth::user()->photographer != null) {
            // $events = Event::where('photographer_id', Auth::user()->photographer->id)->get();
            $events = DB::table('events')
                ->join('event_payments', 'events.id', '=', 'event_payments.event_id')
                ->join('photographers', 'event_payments.photographer_id', '=', 'photographers.id')
                ->select('events.*')
                ->where('photographers.id', Auth::user()->photographer->id)
                ->get();
        } else {
            $events = Event::where('organizer_id', Auth::user()->organizer->id)->get();
        }
        return view('livewire.photographer.show-my-events', compact('events'));
    }
}
