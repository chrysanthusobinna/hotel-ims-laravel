<x-admin-layout>

    @section('page-title')
    Room Categories
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings') }}">Settings</a></li>
    @endsection





    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; All Room Class  ( <b>{{ $RoomCategories->count() }}</b> )</h3>

          <div class="card-tools">
   
            <div class="input-group input-group-sm" >
            
              <div class="input-group-append">
                <button onclick="window.location='{{ route('admin.settings.room-categories.create') }}';"  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
                ADD CATEGORY</button>
              </div>
            </div>
 
          </div>
        </div>
        <!-- /.card-header -->
      <div class="card-body table-responsive">

            @if ($RoomCategories->isEmpty())
                <p>No room categories found.</p>
            @else



        <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                <th>CLASS NAME</th>
                <th>DESCRIPTION</th>
                <th>WEEKDAY PRICE </th>
                <th>WEEKEND PRICE </th>
                <th style="width:10%;">#</th>
              </tr>
          </thead>

            <tbody>


              @foreach($RoomCategories as $RoomCategory)

                <tr>
                <td> {{ $RoomCategory->name }}</td>
                <td> {{ substr($RoomCategory->description, 0, 30)."..." }}</td>
                <td>{!! env('CURRENCY_SIGN') !!}  {{ number_format($RoomCategory->weekday_price,2) }}   </td>
                <td>{!! env('CURRENCY_SIGN') !!}  {{ number_format($RoomCategory->weekend_price,2) }}  </td>
                <td>
                      
                <button onclick="window.location='{{ route('admin.settings.room-categories.edit', $RoomCategory->id)  }}';"  type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i> </button>
                
                <button 
                data-form_action='{{ route('admin.settings.room-categories.delete', $RoomCategory->id)  }}'
                data-categorty_name='{{ $RoomCategory->name }}'
                data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>
           
              
               
                </td>
                </tr>
 
                @endforeach

 
            </tbody>


          <tfoot>
          <tr>
                <th>CLASS NAME</th>
                <th>DESCRIPTION</th>
                <th>WEEKDAY PRICE </th>
                <th>WEEKEND PRICE </th>
                <th>#</th>
          </tr>
          </tfoot>

        </table>   
        
        @endif


        </div>
          <div class="card-footer ">

            &nbsp;

          </div>  
    </div> 















            

            <div class="modal fade" id="modal-delete">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"  >Delete Room Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <p>Are you Sure you want to Delete Room Category "<b id="categorty_name"></b>" ?</p>

                  </div>
                  <div class="modal-footer justify-content-between">
                <form action="" method="POST" id="delete_form">
                  @csrf
                  @method('DELETE')

                <input type="hidden" name="id" id="categorty_id"/>
                        <button type="submit"   class="btn btn-primary">YES</button>
                </form>
                        <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
                </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->







          
 

            <script type="text/javascript">
              $(function(){
                $(".open-DeleteDialog").click(function(){

                $('#delete_form').attr('action', $(this).data('form_action'));
                $("#categorty_name").html($(this).data('categorty_name'));
            
                });
              });
            
            </script>

</x-admin-layout>
