@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your followees</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($users as $user)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <a href="profile/{{$user->id}}">
                                        {{$user->name}}
                                    </a>
                                    @include('follow-button')
                                </li>
                            @empty
                                <li class="list-group-item">You are not following anyone currently.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
