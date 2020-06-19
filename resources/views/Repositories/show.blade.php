@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$repository->name}}</div>
                    <div class="card-body ">
                        <p>{{$repository->description}}</p>


                        Files:
                        <ul class="list-inline">
                            @forelse($repository->files as $file)
                                <li class="list-inline-item">

                                    <form action="/remove-file/{{$file->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{asset('storage/files/'. $file->name)}}">

                                            {{$file->name}}
                                        </a>
                                        {{--                                        {{dd($contributors->contains('user_id', Auth::id()))}}--}}
                                        @if($repository->user_id == Auth::id() || $contributors->contains('user_id', Auth::id()))
                                            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                                        @endif
                                    </form>
                                </li>
                            @empty
                                <li class="list-inline-item">No files.</li>
                            @endforelse
                        </ul>
                        Contributors:
                        <ul class="list-inline">
                            @forelse($contributors as $contributor)
                                <li class="list-inline-item">
                                    <form action="/remove-contributor/{{$contributor->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="/profile/{{$contributor->user->id}}">
                                            {{$contributor->user->name}}
                                        </a>
                                        @if($repository->user_id == Auth::id())

                                            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                                        @endif
                                    </form>
                                </li>
                            @empty
                                <li class="list-inline-item">No contributors.</li>
                            @endforelse
                        </ul>


                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        @if($repository->user_id == Auth::id())
                            <a href="/repositories/{{$repository->id}}/issues" class="btn mr-auto">
                                Issues
                            </a>

                            @include('repositories.upload-file-button')

                            <a class="btn btn-primary"
                               href="/repositories/{{$repository->id}}/edit">
                                Edit
                            </a>
                            <form action="/repositories/{{$repository->id}}" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-primary ml-1"
                                        type="submit">
                                    DeleteK
                                </button>
                            </form>

                            @error('file')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        @else
                            <a href="/repositories/{{$repository->id}}/issues" class="btn mr-auto">
                                Issues
                            </a>
                            @if($contributors->contains('user_id', Auth::id()))
                                @include('repositories.upload-file-button')

                            @endif

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
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
