<x-admin-layout>

    @section('page-title')
    General Settings
    @endsection


    @section('back-link')
    <a href="{{ route('admin.settings') }}">Settings</a></li>
    @endsection




     		
    <div class="row">
        <div class="col-md-6">
 
          <div class="card card-primary card-outline">
     
          <div class="card-body">
          <form action="{{ route('admin.settings.general-settings') }}" method="POST">
            @csrf
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><b>Email Address</b></td>
                  <td><input  required type="text" name="company_email_address" value="{{ $generalsettings->company_email_address ?? old('company_email_address') }}"   class="form-control"> </td>
                </tr>
                <tr>
                  <td><b>Email Addresse 2</b></td>
                  <td><input type="text" name="company_email_address_2"   value="{{ $generalsettings->company_email_address_2 ?? old('company_email_address_2') }}"   class="form-control"> </td>
                </tr>
                <tr>
                  <td><b>Phone Number</b></td>
                  <td><input required type="text" name="company_phone_number"   value="{{ $generalsettings->company_phone_number ?? old('company_phone_number') }}"   class="form-control"> </td>
                </tr>
                <tr>
                  <td><b>Phone Numbers 2</b></td>
                  <td><input type="text" name="company_phone_number_2"   value="{{ $generalsettings->company_phone_number_2 ?? old('company_phone_number_2') }}"   class="form-control"> </td>
                </tr>
                <tr>
                  <td><b>Address</b></td>
                  <td><input type="text" name="company_address"   value="{{ $generalsettings->company_address ?? old('company_address') }}"   class="form-control"> </td>
                </tr>					
                <tr>
                  <td><b>Fixed Check in hours</b></td>
                  <td><input required type="text" name="default_check_in_hours"   value="{{ $generalsettings->default_check_in_hours ?? old('default_check_in_hours') }}"   class="form-control"> </td>
                </tr>					

                 <tr>
                  <td><b>Fixed Check out hours</b></td>
                  <td><input required type="text" name="default_check_out_hours"   value="{{ $generalsettings->default_check_out_hours ?? old('default_check_out_hours') }}"   class="form-control"> </td>
                </tr>						
               <tr>
                  <td><b>#</b></td>
                  <td><button type="submit"   class="btn   btn-sm  btn-info btn-lg btn-block">SAVE</button></td>
                </tr>                   


              </tbody>
            </table>
            </form>
          </div> <!-- /.card-body -->

            </div> <!-- /.card -->
         
        </div> <!-- /.col -->
        
        <div class="col-md-6">
      
         <div class="card card-primary card-outline">
      
          <div class="card-body">

            <hr/>
            <iframe src="https://maps.google.it/maps?q={{ $generalsettings->company_address }} &output=embed"   frameborder="0" style="border:0;width: 100%; height:440px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <hr/>

            
 

        </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->





</x-admin-layout>
