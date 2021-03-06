@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trending repositories</div>

                    <div class="card-body">

                        <form action="{{route('search')}}" method="get">

                            <div class="input-group">
                                <input type="text" name="name" class="form-control" required>
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">search</button>
                                </span>
                            </div>
                                @error('search')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                        </form>
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
                                        <form action="{{route('remove-star',$repository)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn   float-right"
                                                    type="submit">
                                                <i class="fas fa-star"></i>
                                                {{$repository->stars}}
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{route('add-star',$repository)}}" method="post">
                                            @csrf
                                            <button
                                                class="btn float-right"
                                                type="submit">
                                                <i class="far fa-star"></i>
                                                {{$repository->stars}}
                                            </button>
                                        </form>
                                    @endif

                                    <p>
                                        {{$repository->description}}
                                    </p>

                                    <ul class="navbar-nav ">
                                        <li class="nav-item">
                                            <a href="{{url("/repositories/$repository->id/issues")}}"
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
