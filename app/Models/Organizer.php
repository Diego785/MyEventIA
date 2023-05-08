<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $table = 'organizers';
    protected $fillable = ['id', 'name', 'carnet', 'telephone', 'user_id'];

    public function event()
    {
        return $this->hasOne(Organizer::class, 'organizer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function event_payment()
    {
        return $this->hasMany(EventPayment::class, 'organizer_id');
    }
}
