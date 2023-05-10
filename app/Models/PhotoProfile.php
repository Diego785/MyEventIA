<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProfile extends Model
{
    use HasFactory;
    protected $table = 'photo_profiles';
    protected $fillable = ['id', 'path', 'guest_id'];

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}
