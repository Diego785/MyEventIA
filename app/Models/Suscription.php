<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use HasFactory;
    protected $table = 'suscriptions';
    protected $fillable = ['id', 'status', 'time', 'amount', 'photographer_id', 'organizer_id'];

    public function photographer(){
        return $this->hasMany(Photographer::class, 'photographer_id');
    }

}
