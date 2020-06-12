@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Starred repositories</div>

                    <div class="card-body">
                        <div class=" ml-auto mr-4">
                        </div>
                        <ul class="list-group ">

                            @foreach($repositories as $repository)

                                <li class="list-group-item list-group-item-action">
                                    <a href="">{{$repository->name}}</a>
                                    <form action="{{route('remove-star',$repository)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn float-right"
                                                type="submit">
                                            <i class="fas fa-star"></i>

                                        </button>
                                    </form>
                                    <p>
                                        {{$repository->description}}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class=" ml-auto mr-4">
                        {{ $repositories->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
