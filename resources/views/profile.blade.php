@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 ">
                <div class="d-flex justify-content-center">
                    {{--                todo profile pic --}}
                    <img
                        class="img-thumbnail"
                        src="https://media.geeksforgeeks.org/wp-content/uploads/20190506164011/logo3.png"
                        alt="">
                </div>
                <div class="d-flex justify-content-center m-3">
                    <p class="h5">{{$user->name}}</p>
                </div>
                <div class="d-flex justify-content-center">
                    @if($user->id == Auth::id())
{{--                        todo change pic--}}
                    @else
                        @include('follow-button')
                    @endif
                </div>
            </div>
            <div class="list-group  col-8 d-flex flex-wrap ">
                @if($repositories->isEmpty())
                    <div class="alert alert-secondary m-auto">
                        User has no repositories!
                    </div>
                @endif
                @foreach($repositories as $repository)
                    <div class="card col-4 m-2 ">

                        <div class="card-header">
                            {{$repository->name}}
                        </div>
                        <div class="card-body">
                            {{$repository->description}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
