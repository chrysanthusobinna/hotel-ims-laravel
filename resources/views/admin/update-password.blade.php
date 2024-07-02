<x-admin-layout>


    @section('page-title')
    Change Password
    @endsection


    @section('back-link')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    @endsection


    

                <center>
                 <div class="card card-primary card-outline" style="width:50%;">
          
     
     
     
                    <!-- form start -->
                    <form action="{{ route('admin.update-passowrd') }}" class=" " method="POST" >
                        @csrf
     
     
                      <div class="card-body">
     
 
      <br/>
     
     
                 <table class="table"> <tbody>
     
                       <tr>
                         <td>Old Password</td>
                         <td>
                         <input class="form-control"   name="old_password"  type="password" placeholder="Old Password" required></td>
                        </tr>
                           <tr>
                         <td>New Password</td>
                         <td>
                         <input class="form-control"   name="new_password"  type="password" placeholder="New Password" required></td>
                        </tr>

                        <tr>
                         <td>Re-type Password</td>
                         <td>
                         <input class="form-control"   name="confirm_password"  type="password" placeholder="Re-type Password" required></td>
                        </tr>
                        
                        <tr>
                         <td> </td>
                         <td>
                            <button type="submit"   class="btn btn-primary btn-block">SUBMIT</button>
                        </td>
                        </tr>     
     
                  </tbody> </table>
     
     
     
                     </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        
                       </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <!-- /.card -->
                </center>

     

                  


</x-admin-layout>
