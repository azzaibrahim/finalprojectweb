@if(Session::has('success'))

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">success</h4>
            {{Session::get('success')}}
    </div>

@endif



@if($errors ->any())

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You should check in on some of those fields below!</strong> <br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors ->all() as $error)
        {{$error}} </br>
        @endforeach
    </div>



@endif
