
<x-admin-layout>

    @section('page-title')
    All Settings
    @endsection


    @section('back-link')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    @endsection



 
	 <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; All Settings</h3> </div>
              <!-- /.card-header -->
            <div class="card-body">
		
		
    <div class="row">
		  
          <div class="col-md-6 col-sm-6 col-12">
		   <a    href="{{ route('admin.settings.general-settings-page') }}" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">GENERAL</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-6 col-sm-6 col-12">
		   <a    href="setup_bookings.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">BOOKING</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

		  
       
	 
 
		  
          <div class="col-md-6 col-sm-6 col-12">
		   <a    href="{{ route('admin.settings.rooms'); }}" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">ROOMS</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-6 col-sm-6 col-12">
		   <a    href="{{ route('admin.settings.room-categories') }}" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">ROOM CATEGORIES</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

	 
 		  
   
        </div>
        <!-- /.row -->



			
			</div>
			
   
					<div class="card-footer ">
              &nbsp;      			
          </div>
  
        </x-admin-layout>
