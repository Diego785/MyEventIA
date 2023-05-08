<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizerEventsController extends Controller
{
    public function photographers(){
        return view('my-views.organizer.photographers');
    }
}
