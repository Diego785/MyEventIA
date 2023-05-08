<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPayment extends Model
{
    use HasFactory;
    protected $table = 'event_payments';
    protected $fillable = ['id', 'status', 'amount', 'description', 'photographer_id', 'organizer_id', 'event_id'];


    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }
    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
