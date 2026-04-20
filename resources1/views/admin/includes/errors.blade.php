@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <p><strong><i class="fa fa-check" aria-hidden="true"></i> {{ $message }}</strong></p>
    </div>
@endif

@if($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <p><strong><i class="fa fa-ban" aria-hidden="true"></i> {{ $message }}</strong></p>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        @foreach($errors->all() as $error)
            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
            <p><strong><i class="fa fa-ban" aria-hidden="true"></i> {{ $error }} </strong></p>
        @endforeach    
    </div>
@endif