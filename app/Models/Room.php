<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['room_number', 'category_id', 'current_state'];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');

    }
}