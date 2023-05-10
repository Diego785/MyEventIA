<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGuest extends Model
{
    use HasFactory;
    protected $table = 'event_guests';
    protected $fillable = ['id', 'event_id', 'guest_id'];


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

}
