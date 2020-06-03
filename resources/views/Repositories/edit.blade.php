@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$repository->name}}</div>

                    <div class="card-body">
                        <form action="/repositories/{{$repository->id}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                            <input class="form-control" type="text" value="{{$repository->name}}" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input class="form-control" type="text" value="{{$repository->description}}" id="description" name="description">
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
