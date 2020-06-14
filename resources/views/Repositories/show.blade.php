@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$repository->name}}</div>
                    <div class="card-body ">
                        <p>{{$repository->description}}</p>
                        @if($repository->user_id == Auth::id())
                            <form action="/repositories/{{$repository->id}}/edit">
                                <button class="btn btn-primary float-left"
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
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
