<?php

namespace App\Http\Livewire\Photographer;

use App\Models\EventPayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowRequests extends Component
{
    public $quantity_requests;

    public function mount($quantity_requests)
    {
        $this->quantity_requests = $quantity_requests;
    }

    public function accept_request($request)
    {
        $event_payment = EventPayment::find($request);
        $event_payment->status = 'Aceptado';
        $event_payment->save();
    }
    public function decline_request($request)
    {
        $event_payment = EventPayment::find($request);
        $event_payment->status = 'Rechazado';
        $event_payment->save();
    }


    public function render()
    {
        $requests = [];
        if (Auth::user()->photographer != null) {

            $requests = EventPayment::where('photographer_id', Auth::user()->photographer->id)->where('status', 'Pendiente')->get();
        }else{
            $requests = EventPayment::where('organizer_id', Auth::user()->organizer->id)->get();

        }

        return view('livewire.photographer.show-requests', compact('requests'));
    }
}
