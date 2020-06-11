@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Starred repositories</div>

                    <div class="card-body">
{{--                        {{dd(Auth::user()->notifications)}}--}}
                        <ul class="list-group ">
{{--                            {{ //dd($repositories) }}--}}

                            @foreach($repositories as $repository)

                                <li class="list-group-item list-group-item-action">
                                    <a href="">{{$repository->name}}</a>
                                    <form action="/starred-repositories/{{$repository->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-lg btn-outline-primary  float-right"
                                                type="submit">
                                            <svg
                                                class="bi bi-star-fill"
                                                width="1em"
                                                height="1em"
                                                viewBox="0 0 16 16"
                                                fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>

                                        </button>
                                    </form>
                                    <p>
                                        {{$repository->description}}
                                    </p>
                                    {{--todo pagination--}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
