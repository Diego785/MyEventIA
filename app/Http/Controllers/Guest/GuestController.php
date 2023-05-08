<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return User::all();
    }
}
