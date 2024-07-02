<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function Index()
    {
        $Rooms          = Room::all();
        $RoomCategories = RoomCategory::withCount('rooms')->get();

        return view('admin.settings.rooms', compact('Rooms','RoomCategories'));

    }


    public function create()
    {
        $RoomCategories = RoomCategory::all();

        return view('admin.settings.room_create', compact('RoomCategories'));


    }

    public function Store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:255|unique:rooms,room_number',
            'category_id' => 'required|exists:room_categories,id',
        ]);

        Room::create([
            'room_number' => $request->room_number,
            'category_id' => $request->category_id,
            'current_state' => 'in_service',
        ]);

        return redirect()->route('admin.settings.rooms')->with('success_message', 'Room created successfully.');
    }
 
    public function Edit(string $id)
    {
        $Room           = Room::findOrFail($id);
        $RoomCategories = RoomCategory::all();

        return view('admin.settings.room_edit', compact('Room','RoomCategories'));

    }

 
    public function Update(Request $request, string $id)
    {
  
        $Room = Room::findOrFail($id);

        $request->validate([
            'room_number' => 'required|string|max:255|unique:rooms,room_number',
            'category_id' => 'required|exists:room_categories,id',
        ]);
    
        $Room->update([
            'room_number' => $request->room_number,
            'category_id' => $request->category_id,
            'current_state' => 'in_service',
        ]);

 
        return redirect()->route('admin.settings.rooms.edit', $id)->with('success_message', 'Room updated successfully.');
    }


    public function Delete(string $id)
    {
        $Room          = Room::findOrFail($id);
        $Room->delete();
        
        return redirect()->route('admin.settings.rooms')->with('success_message', 'Room  deleted successfully!');
   
    }
}
