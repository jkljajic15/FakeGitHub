@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your followers</div>
                    <div class="card-body">
                        <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item list-group-item-action">
                                <a href="profile/{{$user->id}}">
                                    {{$user->name}}
                                </a>
{{--                                @include('follow-button')--}}
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
