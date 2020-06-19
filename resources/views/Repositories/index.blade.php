@extends('layouts.app')
@section('content')
    <div class="container">
        <v-notification></v-notification>
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
                                        <ul class="navbar-nav float-right">
                                            <li class="nav-item nav">
                                                <a href="{{url("/repositories/$repository->id/issues")}}"
                                                   class="nav-link ">
                                                    Issues
                                                </a>
                                            </li>
                                        </ul>
                                        <p>
                                            {{$repository->description}}
                                        </p>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="d-flex mt-2">
                            <div>
                                <a class="btn btn-primary"
                                   href="/repositories/create" role="button">
                                    Add new Repository
                                </a>
                            </div>
                            <div class=" ml-auto mr-4">
                                {{ $repositories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
