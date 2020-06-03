@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your repositories</div>

                    <div class="card-body">

                        <ul class="list-group ">
                            @foreach($repositories as $repository)
                                @if($repository->user_id == Auth::id())

                                    <li class="list-group-item list-group-item-action">
                                        <a href="repositories/{{$repository->id}}">{{$repository->name}}</a>
                                        <p>
                                            {{$repository->description}}
                                        </p>
                                        {{--todo  pagination--}}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class=" mt-2">
                            <a name="" id="" class="btn btn-primary" href="/repositories/create" role="button">Add new
                                Repository</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
