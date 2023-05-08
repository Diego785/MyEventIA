<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $fillable = ['id', 'path', 'category', 'photographer_id', 'event_id'];


    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
