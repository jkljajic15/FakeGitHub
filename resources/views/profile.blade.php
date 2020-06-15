@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row ">
            <div class="column col-md-4 text-center">
                <div class="">
                    <img
                        class="img-thumbnail "
                        src="{{ asset('images/'. $user->avatar) }}"
                        style="height: 250px; width: 250px;"
                        alt="avatar">
                </div>
                <div>
                    <p class="h5">{{$user->name}}</p>
                </div>
                <div class="col-12 float-none">
                    @if($user->id == Auth::id())

                        <v-button></v-button>
                    @else
                        @include('follow-button')
                    @endif
                </div>
            </div>
            <div class="list-group  col-md-8  flex-wrap ">
                @forelse($repositories as $repository)
                    <div class="card col-4 m-2 ">

                        <div class="card-header">
                            {{$repository->name}}
                        </div>
                        <div class="card-body">
                            {{$repository->description}}
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary m-auto">
                        User has no repositories!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
