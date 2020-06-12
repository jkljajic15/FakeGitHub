@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trending repositories</div>

                    <div class="card-body">

                        <ul class="list-group ">

                            @foreach($repositories as $repository)

                                <li class="list-group-item list-group-item-action">

                                    <a href="profile/{{$repository->user->id}}">
                                        {{$repository->user->name}}
                                    </a>
                                    /
                                    <a href="repositories/{{$repository->id}}">
                                        {{$repository->name}}
                                    </a>


                                    @if(in_array($repository->id,$user_starred_repository_ids))
                                        <form action="/explore/{{$repository->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn   float-right"
                                                    type="submit">
                                                <i class="fas fa-star"></i>

                                            </button>
                                        </form>
                                    @else
                                        <form action="/explore/{{$repository->id}}" method="post">
                                            @csrf
                                            <button class="btn    float-right"
                                                    type="submit">
                                                <i class="far fa-star"></i>

                                            </button>
                                        </form>
                                    @endif

                                    <p>
                                        {{$repository->description}}
                                    </p>

                                    <ul class="navbar-nav ">
                                        <li class="nav-item">
                                            <a href="{{url("/repositories/$repository->name/issues")}}"
                                               class="nav-link">Issues</a>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                        <div class=" ml-auto mr-4">
                            {{ $repositories->links() }}
                        </div>
                </div>

            </div>
        </div>
    </div>
@endsection
