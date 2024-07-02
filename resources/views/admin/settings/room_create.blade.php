<x-admin-layout>

    
    @section('page-title')
    Add Room 
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings.rooms') }}">All Rooms</a></li>
    @endsection




    <link rel="stylesheet" href="/admin-dashboard-resource/css/css-loader.css">


    <div class="loader loader-default is-active" id="loader_santhus" style=""></div>


    <center>
        <div class="card card-primary card-outline" style="width:65%;">

           <!-- form start -->
           <form action="{{ route('admin.settings.rooms.store') }}" class=" " method="POST" >
               @csrf

             <div class="card-body">

                            <br/>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style='width: 30%;'><b>Room Number</b></td>
                                    <td><input required  type="number" name="room_number" value="{{ old('room_number') }}"   class="form-control"> </td>
                                </tr>
                                <tr>
                                    <td><b>Room Category</b></td>
                                    <td>
                                        <select id='category_id' class="form-control"   name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach($RoomCategories as $RoomCategory)
                                                <option value="{{ $RoomCategory->id }}" {{ old('category_id') == $RoomCategory->id ? 'selected' : '' }}>
                                                    {{ $RoomCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                   					
                                 
                                </tbody>
                            </table>


                            <br/>

                            <div id="show_room_class_info"></div>
        

                            

            </div>
             <!-- /.card-body -->
             <div class="card-footer">
                <button type="submit" class="btn btn-primary float-left">Submit</button>
                <button type="button"  onclick="window.location='{{ route('admin.settings.rooms') }}'" class="btn btn-danger float-right">Back</button>
              </div>
             <!-- /.card-footer -->
           </form>
         </div>
         <!-- /.card -->
       </center>
       <br/>

 

 

       @push('js')
       <script>
        $(document).ready(function() {
            function fetch_room_class_info(room_class_id) {
                $.ajax({
                    url: "http://127.0.0.1:8000/admin/settings/room-categories/show/" + room_class_id,
                    type: "GET",
                    beforeSend: function() {
                        $("#loader_santhus").show();
                    },
                    success: function(response) {
                        $("#loader_santhus").hide();
                        $("#show_room_class_info").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching room category info:", error);
                    }
                });
            }
        
            // Example usage: Fetch info when a category is selected
            $('#category_id').change(function() {
                const roomClassId = $(this).val();
                if (roomClassId) {
                    fetch_room_class_info(roomClassId);
                }
            });
        });
        </script>
 
        <script>
        $(window).on('load', function(){

        $('#loader_santhus').hide();
        });

        </script>

       @endpush
   

       @push('css')
       <link rel="stylesheet" href="/admin-dashboard-resource/plugins/ekko-lightbox/ekko-lightbox.css">
       @endpush
       
</x-admin-layout>

