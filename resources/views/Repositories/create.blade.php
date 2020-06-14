@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create
                    </div>
                    <div class="card-body">
                        <form action="/repositories" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control"
                                       type="text"
                                       required
                                       name="name">
                                @error('name')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control"
                                          type="text"
                                          name="description"
                                          required
                                          rows="2"></textarea>
                                @error('description')
                                    <p>
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                            <button type="submit"
                                    class="btn btn-primary">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
