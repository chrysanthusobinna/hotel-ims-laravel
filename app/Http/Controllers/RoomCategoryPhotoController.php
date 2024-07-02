<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;
use App\Models\RoomCategoryPhoto;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRoomCategoryPhotoRequest;
use App\Http\Requests\UpdateRoomCategoryPhotoRequest;

class RoomCategoryPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {

        $RoomCategory = RoomCategory::findOrFail($id);
        $roomCategoryPhotos = $RoomCategory->roomCategoryPhotos;
        return view('admin.settings.room_categories_photos', compact('RoomCategory', 'roomCategoryPhotos'));

    }


    public function store(Request $request)
    {


        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
            'room_category_id' => 'required|exists:room_categories,id', // Ensure the room category ID exists in the room_categories table
        ]);

        // Get the original file name of the uploaded photo
        $originalFileName = $request->file('photo')->getClientOriginalName();

        // Generate a unique file name to prevent conflicts
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $photoName = 'img-' . time() . '.' . $extension;


        $photoPath = Storage::disk('public')->put("room_photos", $request->file('photo'));

        // Save the photo path and room category ID to the database
        RoomCategoryPhoto::create([
            'room_category_id' => $request->room_category_id,
            'photo_path' => $photoPath,
        ]);

        return back()->with('success_message', 'Photo uploaded successfully.');

        /*

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
            'room_category_id' => 'required|exists:room_categories,id', // Ensure the room category ID exists in the room_categories table
        ]);

        // Get the original file name of the uploaded photo
        $originalFileName = $request->file('photo')->getClientOriginalName();

        // Generate a unique file name to prevent conflicts
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $uniqueSuffix = time() . '-' . uniqid();
        $photoName = $fileName . '-' . $uniqueSuffix . '.' . $extension;

        // Store the file in the public disk
        $photoPath = Storage::disk('public')->putFileAs(
            'uploads',
            $request->file('photo'),
            $photoName
        );

        // Save the photo path and room category ID to the database
        RoomCategoryPhoto::create([
            'room_category_id' => $request->room_category_id,
            'photo_path' => $photoPath,
        ]);

        return back()->with('success_message', 'Photo uploaded successfully.');

        */


    }




    public function destroy(RoomCategoryPhoto $roomCategoryPhoto)
    {
        // Delete the photo from storage
        if (Storage::disk('public')->exists($roomCategoryPhoto->photo_path)) {
            Storage::disk('public')->delete($roomCategoryPhoto->photo_path);
        }

        // Delete the record from the database
        $roomCategoryPhoto->delete();

        return back()->with('success_message', 'Photo deleted successfully.');
    }

}
