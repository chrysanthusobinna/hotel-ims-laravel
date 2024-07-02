<x-admin-layout>

    @section('page-title')
    Rooms
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings') }}">Settings</a></li>
    @endsection






    @foreach($RoomCategories as $RoomCategory)
 

                    
                                
                                
 
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; {{ $RoomCategory->name }} Rooms  ( <b>{{ $RoomCategory->rooms_count }}</b> )</h3>

                    <div class="card-tools">
            
                        <div class="input-group input-group-sm" >
                        
                        <div class="input-group-append">
                            <button onclick="window.location='{{ route('admin.settings.rooms.create') }}';"  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
                            ADD ROOM</button>
                        </div>
                        </div>
            
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

          
 
                            @if($RoomCategory->rooms->isEmpty())
                                <p>No rooms found for this category.</p>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ROOM NUMBER</th>
                                    <th>WEEKDAY PRICE </th>
                                    <th>WEEKEND PRICE </th>
                                    <th style="width:10%;">#</th>
                                </tr>
                                </thead>
        
                                <tbody>
                                    @foreach($RoomCategory->rooms->sortBy('room_number') as $Room)
                                    <tr>
                                        <td> {{ $Room->room_number }}</td>
                                        <td>{!! env('CURRENCY_SIGN') !!}  {{ number_format($RoomCategory->weekday_price,2) }}   </td>
                                        <td>{!! env('CURRENCY_SIGN') !!}  {{ number_format($RoomCategory->weekend_price,2) }}  </td>
                                        <td>
                                            
                                        <button onclick="window.location='{{ route('admin.settings.rooms.edit', $Room->id)  }}';"  type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i> </button>
                                        
                                        <button 
                                        data-form_action='{{ route('admin.settings.room.delete', $Room->id)  }}'
                                        data-room_number='{{ $Room->room_number }}'
                                        data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>
                                
                                    
                                    
                                        </td>
                                        </tr>
                                    @endforeach
                               
            
                        </tbody>


                        <tfoot>
                        <tr>
                                <th>ROOM NUMBER</th>
                                <th>WEEKDAY PRICE </th>
                                <th>WEEKEND PRICE </th>
                                <th style="width:10%;">#</th>
                        </tr>
                        </tfoot>
    
                        </table>   
                            @endif
 

                    </div>
                    <div class="card-footer ">

                        &nbsp;

                    </div>  
                </div> 







    @endforeach

















            

            <div class="modal fade" id="modal-delete">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"  >Delete Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <p>Are you Sure you want to Delete Room  "<b id="room_number"></b>" ?</p>

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
                $("#room_number").html($(this).data('room_number'));
            
                });
              });
            
            </script>

</x-admin-layout>
