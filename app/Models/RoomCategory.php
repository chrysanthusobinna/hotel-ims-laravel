<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomCategoryPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 
        'description', 
        'weekday_price', 
        'weekend_price',
    ];   


    public function roomCategoryPhotos()
    {
        return $this->hasMany(RoomCategoryPhoto::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'category_id');

    }

}
