@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New issue</div>
                    <div class="card-body">
                        <form action="/repositories/{{$id}}/issues" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control"
                                       type="text"
                                       name="title"
                                       placeholder="Enter issue title..."
                                       required>
                            </div>
                            @error('title')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                            <div class="form-group">
                                <textarea class="form-control"
                                          name="body"
                                          rows="2"
                                          required
                                          placeholder="Describe the issue..."></textarea>
                                @error('body')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <input class="btn btn-primary float-right"
                                   type="submit"
                                   value="Submit a ticket">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
