<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

        class RoomCategoryController extends Controller
        {
        
            public function Index()
            {
                $RoomCategories = RoomCategory::all();
                return view('admin.settings.room-categories', compact('RoomCategories'));

            }

        
            public function create()
            {
                return view('admin.settings.room_categories-create');

            }
        

            public function Store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:room_categories|max:255',
                    'description' => 'required',
                    'weekday_price' => 'required|numeric',
                    'weekend_price' => 'required|numeric',
                ]);
            
                // Modify the name field to capitalize each word
                $name = ucwords(strtolower($request->name));
                $data = $request->all();
                $data['name'] = $name;

                $roomCategory = RoomCategory::create($data);

    
                return redirect()->route('admin.settings.room-categories.photos', $roomCategory->id)->with('success_message', 'Room Category created successfully. You can add photos!');
            }
            
            

            
        public function Show(string $id)
        {
            //
            $RoomCategory = RoomCategory::findOrFail($id);

            
            return view('admin.settings.room_categories-show', compact('RoomCategory'));
          
        }

 
        public function edit(string $id)
        {
            $RoomCategory = RoomCategory::findOrFail($id);

            return view('admin.settings.room_categories-edit', compact('RoomCategory'));

        }

  
        public function Update(Request $request, string $id)
        {
      
            $RoomCategory = RoomCategory::findOrFail($id);

            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'weekday_price' => 'required|numeric',
                'weekend_price' => 'required|numeric',
            ]);
        
            // Modify the name field to capitalize each word
            $name = ucwords($request->name);
            $data = $request->all();
            $data['name'] = $name;


            $RoomCategory->update($data);

            return redirect()->route('admin.settings.room-categories.edit', $id)->with('success_message', 'Room Category updated successfully.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function Delete(string $id)
    {
        $RoomCategory = RoomCategory::findOrFail($id);
        
        $RoomCategory->delete();
        
        return redirect()->route('admin.settings.room-categories')->with('success_message', 'Room Category deleted successfully!');
   
    }
}
