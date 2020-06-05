@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Issues</div>

                    <div class="card-body">

                        <div class="list-group ">
                            @foreach($issues as $issue)

{{--                                <a href="issues/{{$issue->id}}">--}}
                                    <a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action">


                                        <h5>{{$issue->title}}</h5>
                                        <p>
                                            {{$issue->body}}
                                        </p>


                                    </a>
{{--                                </a>--}}
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
