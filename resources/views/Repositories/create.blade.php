@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form action="/repositories" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" type="text" name="description" id="desc"
                                          rows="2"></textarea>
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
