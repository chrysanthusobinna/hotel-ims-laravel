<x-admin-layout>

    @section('page-title')
    Room Categories Photos
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings') }}">Settings</a></li>
    @endsection

    @push('css')
    <link rel="stylesheet" href="/admin-dashboard-resource/plugins/ekko-lightbox/ekko-lightbox.css">
    @endpush
    
    @push('js')
    <script src="/admin-dashboard-resource/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    @endpush


    <div class="card card-primary card-outline">
        <div class="card-body">
  
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><b>Name</b></td>
                    <td> {{ $RoomCategory->name }} </td>
                </tr>
                <tr>
                    <td><b>Description</b></td>
                    <td> {{ $RoomCategory->description }} </td>
                </tr>

                </tbody>
            </table>



        </div>
        <!-- /.card-body -->
      </div>
 


 
 
        <div class="card card-primary card-outline">
            <div class="card-header">
                Photos
        </div>
            <div class="card-body">
    
				<form action="{{ route('admin.settings.room-categories.photos.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <input type="hidden" name="room_category_id" value="{{ $RoomCategory->id }}">


                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td><b>Upload Photos</b></td>
                            <td><input  type='file' name='photo'   class="form-control"> </td>
                            <td>
                                <button type="submit" class="btn-block btn btn-primary">UPLOAD</button>
                              </td>

                          </tr>

                      </tbody>
                      </table> 
                    </form>
                    {{ $category->name }} ({{ $category->rooms_count }} rooms)


                <hr/>
                @if ($roomCategoryPhotos->isEmpty())
                <p>No Photos found for this room Category.</p>
                @else

                    <div class="filter-container p-0 row" >

                            @foreach ($roomCategoryPhotos as $photo)

                           
                                    <div id='{{ $photo->id }}' class='filtr-item col-sm-2' data-category='2, 4' data-sort='black sample'>
                                        <a href='{{ "/storage/" . $photo->photo_path }}' data-toggle='lightbox' data-title='{{ $RoomCategory->name }} Category'>
                                        <img src='{{ "/storage/" . $photo->photo_path }}'  class='img-fluid mb-2' alt='Room Category Photo '/>
                                        </a>

                                        <form action="{{ route('admin.settings.room-categories.photos.delete', $photo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                                        </form>
                                    </div>
        
                            
                            @endforeach
                    </div>

                @endif

        
            </div>

            <div class="card-footer">
                <button type="button" onclick="window.location='{{ route('admin.settings.room-categories') }}'"  class="btn btn-info">Room Categories</button>
                <button type="button" onclick="window.location='{{ route('admin.settings.room-categories.edit', $RoomCategory->id) }}'" class="btn btn-danger float-right">BACK</button>
              </div>           
        </div> 


     
  


</x-admin-layout>
