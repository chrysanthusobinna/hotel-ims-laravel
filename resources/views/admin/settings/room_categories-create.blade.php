<x-admin-layout>

    @section('page-title')
    Create Room Categories
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings.room-categories') }}">Room Categories</a></li>
    @endsection



    <center>
        <div class="card card-primary card-outline" style="width:65%;">

           <!-- form start -->
           <form action="{{ route('admin.settings.room-categories.store') }}" class=" " method="POST" >
               @csrf

             <div class="card-body">

                            <br/>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><input required  type="text" name="name" value="{{ old('name') }}"   class="form-control"> </td>
                                </tr>
                                <tr>
                                    <td><b>Description</b></td>
                                    <td><textarea required name="description"   class="form-control">{{ old('description') }}</textarea></td>
                                </tr>
                   					
                                <tr>
                                    <td><b>Weekday Price ({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td><input required  type="text" name="weekday_price"  value="{{ old('weekday_price') }}"  class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><b>Weekend Price({!! env('CURRENCY_SIGN') !!})</b></td>
                                    <td><input required  type="text"  name="weekend_price"  value="{{ old('weekend_price') }}" class="form-control"> </td>
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
