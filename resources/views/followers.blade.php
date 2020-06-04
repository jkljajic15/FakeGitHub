@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your followers</div>

                    <div class="card-body">
                        <ul class="list-group">
                        @foreach($followers as $follower)
                            <li class="list-group-item list-group-item-action">{{$follower->name}}
                                <a name="" id="" class="btn btn-primary float-right" href="#" role="button">Follow</a>
                            </li>
                        @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
