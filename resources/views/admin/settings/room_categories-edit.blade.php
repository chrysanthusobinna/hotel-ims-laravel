<x-admin-layout>

    @section('page-title')
    Edit Room Categories
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings.room-categories') }}">Room Categories</a></li>
    @endsection




    <center>
        <div class="card card-primary card-outline" style="width:65%;">
            <div class="card-header">
                
                <div class="card-tools">
		 
                  <div class="input-group input-group-sm">
                  
                    <div class="input-group-append">
                      <button  onclick="window.location='{{ route('admin.settings.room-categories.photos', $RoomCategory->id) }}';" type="button" class="btn btn-default"><i class="fas fa-image"></i>
					  CATEGORY PHOTOS</button>
                    </div>
                  </div>
       
				</div>
              </div>
           <!-- form start -->
           <form action="{{ route('admin.settings.room-categories.update', $RoomCategory->id)  }}" class=" " method="POST" >
               @csrf
               @method('PUT')

             <div class="card-body">

                            <br/>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><input required  type="text" name="name" value="{{ $RoomCategory->name ?? old('name') }}"   class="form-control"> </td>
                                </tr>
                                <tr>
                                    <td><b>Description</b></td>
                                    <td><textarea required name="description"   class="form-control">{{ $RoomCategory->description ?? old('description') }}</textarea></td>
                                </tr>
                   					
                                <tr>
                                    <td><b>Weekday Price ({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td><input required   type="text"  name="weekday_price" value="{{ $RoomCategory->weekday_price ?? old('weekday_price') }}"  class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><b>Weekend Price({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td><input required   type="text" name="weekend_price"  value="{{ $RoomCategory->weekend_price ?? old('weekend_price') }}" class="form-control"> </td>
                                </tr>
                                </tbody>
                            </table>
                         

            </div>
             <!-- /.card-body -->
             <div class="card-footer">
                <button type="submit" class="btn btn-primary float-left">Submit</button>
                <button type="button"  onclick="window.location='{{ route('admin.settings.room-categories') }}'" class="btn btn-danger float-right">Back</button>
              </div>
             <!-- /.card-footer -->
           </form>
         </div>
         <!-- /.card -->
       </center>
       <br/>

 



</x-admin-layout>
