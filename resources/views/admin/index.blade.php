
 
    <x-admin-layout>

        @section('page-title')
        Dashboard
        @endsection
    
    
        @section('back-link')
        &nbsp;
        @endsection
    
    

       
            <script>
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                
                // Convert to 12-hour format and determine AM or PM
                var meridiem = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12 || 12; // Convert 0 to 12 for midnight
                
                // Pad single digit numbers with a leading zero
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
            
                var timeString = hours + ':' + minutes + ':' + seconds + ' ' + meridiem;
            
                document.getElementById('clock').textContent = timeString;
            }
            
            // Call updateClock every second
            setInterval(updateClock, 1000);
            
            // Initial call to display the time immediately
            updateClock();
            </script>


        <div class="row">
		 
            <div class="col-md-4">
            
               <!-- Profile Image -->
               <div class="card card-primary card-outline" style="height:530px;">
                 <div class="card-body box-profile">
                   <div class="text-center">
                     <img class="profile-user-img img-fluid img-circle"
                          src="/admin-dashboard-resource/dist/img/user2-160x160.jpg"
                          alt="User profile picture">
                   </div>
   
                   <h3 class="profile-username text-center"> {{ $user->first_name." ". $user->last_name }} </h3>
   
                   <p class="text-muted text-center"> {{  $user_role }} </p>
                   <hr/>
   
   
    
    
    <br/>
        <a href="manage_bookings_record_statistics.php" class="text-left btn btn-default btn-block"> 
        <i class="far fa-chart-bar"></i> &nbsp;
        <b>Booking Record  </b>
        </a>
 
        
        <a href="#" data-toggle="modal" data-target="#modal-profile" class="text-left btn btn-default btn-block">
        <i class="fas fa-user-shield"></i> &nbsp;
        <b>View My Profile</b>
        </a>

        <a href="{{ route('admin.update-passowrd-page') }}"   class="text-left btn btn-default btn-block">
        <i class="fas fa-lock"></i>&nbsp;
        <b>Change My Password</b></a>

        <a href="logout.php" onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="text-left btn btn-danger btn-block"> 
        <i class="fas fa-sign-out-alt"></i>&nbsp;
        <b>Log out Now</b></a>

                        
    
   
                 </div>
         
                 <!-- /.card-body -->
                 
                 
                 
            
                 <!-- /.card-body -->
                 
               </div>
               <!-- /.card -->
               
            </div>
   
            <div class="col-md-8">
            
            
                      
               <div class="callout callout-info">
                   <h4> Current Time    <br/><span class="badge bg-info float-right"><b id="clock"></b> -   {{ now()->format('l, F j, Y') }}    </span></h4>
                   <br/> <hr/>
                   <h4> Last Login   <br/><span class="badge bg-info float-right"> {{ session('last_online_time') }} </span></h4>
                   <br/>
                 </div>
                 
   
    
    
               <!-- Map card -->
               <div class="card bg-gradient-primary" style="display:none;">
                 <div class="card-header border-0">
                   <h3 class="card-title">
                     <i class="fas fa-map-marker-alt mr-1"></i>
                     Visitors
                   </h3>
                   <!-- card tools -->
                   <div class="card-tools">
                     <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                       <i class="far fa-calendar-alt"></i>
                     </button>
                     <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                   </div>
                   <!-- /.card-tools -->
                 </div>
                 <div class="card-body">
                   <div id="world-map" style="height: 250px; width: 100%;"></div>
                 </div>
                 <!-- /.card-body-->
                 <div class="card-footer bg-transparent">
                   <div class="row">
                     <div class="col-4 text-center">
                       <div id="sparkline-1"></div>
                       <div class="text-white">Visitors</div>
                     </div>
                     <!-- ./col -->
                     <div class="col-4 text-center">
                       <div id="sparkline-2"></div>
                       <div class="text-white">Online</div>
                     </div>
                     <!-- ./col -->
                     <div class="col-4 text-center">
                       <div id="sparkline-3"></div>
                       <div class="text-white">Sales</div>
                     </div>
                     <!-- ./col -->
                   </div>
                   <!-- /.row -->
                 </div>
               </div>
               <!-- /.card -->
   
               <!-- solid sales graph -->
               <div class="card bg-gradient-info" style="display:none;">
                 <div class="card-header border-0">
                   <h3 class="card-title">
                     <i class="fas fa-th mr-1"></i>
                     Sales Graph
                   </h3>
   
                   <div class="card-tools">
                     <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                       <i class="fas fa-times"></i>
                     </button>
                   </div>
                 </div>
                 <div class="card-body">
                   <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer bg-transparent">
                   <div class="row">
                     <div class="col-4 text-center">
                       <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">
   
                       <div class="text-white">Mail-Orders</div>
                     </div>
                     <!-- ./col -->
                     <div class="col-4 text-center">
                       <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">
   
                       <div class="text-white">Online</div>
                     </div>
                     <!-- ./col -->
                     <div class="col-4 text-center">
                       <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">
   
                       <div class="text-white">In-Store</div>
                     </div>
                     <!-- ./col -->
                   </div>
                   <!-- /.row -->
                 </div>
                 <!-- /.card-footer -->
               </div>
               <!-- /.card -->
   
               <!-- Calendar -->
               <div class="card bg-gradient-primary" style="height:330px;">
                 <div class="card-header border-0">
   
                   <h3 class="card-title">
                     <i class="far fa-calendar-alt"></i>
                     Calendar
                   </h3>
                   <!-- tools card -->
                   <div class="card-tools">
    
                     <button type="button" class="btn btn-success btn-sm"  >
                       <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-success btn-sm" >
                       <i class="fas fa-times"></i>
                     </button>
                   </div>
                   <!-- /. tools -->
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body pt-0">
                   <!--The calendar -->
                   <div id="calendar" style="width: 100%"></div>
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
               
               
            
            </div>
   
           </div>
   

 


 




  



            <div class="modal fade" id="modal-profile">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="full_name" ></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">


                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info"><b> {{  $user_role }} </b>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="/admin-dashboard-resource/dist/img/user2-160x160.jpg" id="profile_pic" src="" alt="User Avatar">
                    </div>
                    <div class="card-footer">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p  class="nav-link">
                            <i class="fas fa-user-shield"></i> <b   class="float-right"> {{ $user->first_name." ". $user->last_name }}  </b>
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">
                            <i class="far fa-envelope"></i>  <b   class="float-right">{{ $user->email_address}}  </b>
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">
                            <i class='fas fa-phone-alt'></i>  <b  class="float-right"> {{ $user->phone_number}}  </b>
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">
                            <i class='fas fa-map-marker-alt'></i> <b  class="float-right "> {{ $user->home_address}}  </b>
                            </p>
                        </li>

                    
                        
                    </ul>



                    </div>
                    </div>
                    <!-- /.widget-user -->


                    </div>
                    <div class="modal-footer justify-content-between">
                    <form action="" method="POST">
                    <input type="hidden" value="" id="user_id" name="user_id">
                    <div id="ban_button"></div>
                    </form>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->





    </x-admin-layout>



 