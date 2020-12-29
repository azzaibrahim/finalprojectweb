

@extends('Dashboard.layout.master')



    <div class="container">
    <div>    <br>

        <br>
        <br>
        <br>
        <br>
        <br></div>
        <div class="row">
            @foreach($project as $as)
                <div class="col-6 col-md-4">

                    <img src="{{$as->image}}" height="250" width="250" >
                    <h3>{{$as ->title}}</h3>
                    <br>
                    <br>
                    <form action="{{route('project.destroy',$as->id)}}" method="POST">
                        @csrf
                        @method('delete')

                    <button class="btn btn-danger" style="margin-right:110px">Delet</button>
                    <a  class="btn btn-Primary" href="{{route('project.edit',$as->id)}}">Edite</a>
                    </form>

                </div>

            @endforeach


        </div>

    </div>
