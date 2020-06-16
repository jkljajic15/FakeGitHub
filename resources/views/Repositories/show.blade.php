@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$repository->name}}</div>
                    <div class="card-body ">
                        <p>{{$repository->description}}</p>
                    </div>
                    @if($repository->user_id == Auth::id())
                        <div class="card-footer d-flex justify-content-end">
                            <a href="/repositories/{{$repository->id}}/issues" class="btn mr-auto">
                                Issues
                            </a>
                            <form action="/repositories/{{$repository->id}}/edit">
                                <button class="btn btn-primary"
                                        type="submit">
                                    Edit
                                </button>
                            </form>
                            <form action="/repositories/{{$repository->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                @if($errors->any())
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @endif
                                <button class="btn btn-primary ml-1"
                                        type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>

                    @else
                        <div class="card-footer d-flex justify-content-end">
                            @if(in_array($repository->id,$user_starred_repository_ids))
                                <a href="/repositories/{{$repository->id}}/issues" class="btn mr-auto">
                                    Issues
                                </a>
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
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
