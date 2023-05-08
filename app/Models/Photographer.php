<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;
    protected $table = 'photographers';
    protected $fillable = ['id','telephone', 'carnet', 'photo', 'user_id'];

    public function photo(){
        return $this->hasMany(Photo::class, 'photographer_id');
    }

    public function suscription(){
        return $this->belongsTo(Suscription::class, 'photographer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event_payment()
    {
        return $this->hasMany(EventPayment::class, 'photographer_id');
    }
}
