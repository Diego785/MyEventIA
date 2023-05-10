<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Testing\Fakes\EventFake;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['id', 'name', 'description', 'address', 'date', 'start_time', 'end_time', 'organizer_id'];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

    public function photo(){
        return $this->hasMany(Photo::class, 'event_id');
    }
    public function event_payment()
    {
        return $this->hasMany(EventPayment::class, 'event_id');
    }
    public function event_guest()
    {
        return $this->hasMany(EventGuest::class, 'event_id');
    }
}
