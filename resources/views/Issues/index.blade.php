@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Issues
                        <a href="issues/create" class="btn btn-primary float-right">New issue</a>
                    </div>

                    <div class="card-body">

                        <div class="list-group ">
                            @forelse($issues as $issue)

                                <a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action">

                                    <div class="d-flex justify-content-between">

                                        <p class="h5">{{"#$issue->issue_number $issue->title"}}</p>
                                        <span class="badge {{$issue->status == 'open' ? 'badge-success' : 'badge-danger'}} m-2" > {{$issue->status}}</span>
                                    </div>
                                    <p>
                                        {{$issue->body}}
                                    </p>
                                </a>
                                @empty
                                <a class="list-group-item">
                                    This repository has no issues.
                                </a>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
