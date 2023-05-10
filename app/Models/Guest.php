<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = ['id', 'user_id'];

    public function photo_profile(){
        return $this->belongsTo(PhotoProfile::class, 'guest_id');
    }

    public function event_guest()
    {
        return $this->hasMany(EventGuest::class, 'guest_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
