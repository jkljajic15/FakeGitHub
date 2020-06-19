@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row ">
{{--            <v-notification></v-notification>--}}
            <div class=" col-md-4 text-center">
                <div>
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
            <div class="col-md-8">
                <div class="row h-100 justify-content-center align-items-center">
                @forelse($repositories as $repository)
                    <div class="card col-md-5 m-2">
                        <div class="card-header">
                            {{$repository->name}}
                        </div>
                        <div class="card-body">
                            {{$repository->description}}
                        </div>
                        <div class="card-footer text-right">
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
                    </div>
                    @empty
                    <div class="alert alert-secondary">
                        User has no repositories!
                    </div>
                @endforelse
                </div>
                <div class="float-right">
                    {{$repositories->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
