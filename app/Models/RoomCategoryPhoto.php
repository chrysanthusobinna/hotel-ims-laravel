<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['room_category_id', 'photo_path'];


    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class);
    }
}
