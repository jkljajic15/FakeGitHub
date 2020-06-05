@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$issue->title}}</h5>
                        <a name="" id="" class="btn btn-primary float-right" href="#" role="button">Close</a>
                        <small>Status:{{$issue->status}}</small>
                    </div>
                    {{--                    todo open close issue if user repo--}}
                    <div class="card-body ">
                        <p>{{$issue->body}}</p>


                    </div>
                </div>

                {{--                comments--}}

                @foreach($comments as $comment)

                    <div class="card m-3">
                        <div class="card-header">{{$comment['user']['name']}}
                            <p class="text-muted float-right">{{ \Carbon\Carbon::parse($comment['created_at'])->format('H:i d/m/y') }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$comment['body']}}</p>
                        </div>
                    </div>
                @endforeach
{{--                todo ajax komentar--}}
                <form action="/issue_comments" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="comment" id="" rows="3" placeholder="Leave a comment..."></textarea>
                    </div>
                    <input class="btn btn-secondary float-right" type="submit" name="" id="" value="Comment">
                </form>
            </div>
        </div>
    </div>
@endsection
