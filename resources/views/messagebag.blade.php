
    @if(session('error_message'))
        <div class="alert alert-danger">
            <i class='fa fa-exclamation-circle'></i>  {{ session('error_message') }}
        </div>
    @endif

    @if(session('success_message'))
        <div class="alert alert-success">
            <i class='fa fa-exclamation-circle'></i>  {{ session('success_message') }}
        </div>
    @endif


                
    @if ($errors->any())
                    
        <div class="alert alert-warning text-left" role="alert">
            @foreach ($errors->all() as $error)
            &#183; {{ $error }} <br/>
            @endforeach                      
        </div> 

    @endif
