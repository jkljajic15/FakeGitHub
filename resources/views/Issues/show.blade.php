@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$issue->title}}</h5>
                        @if($issue->status == 'open')
                            @if($issue->user_id == Auth::id())
                                <form action="/issues/{{$issue->id}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-primary float-right" type="submit">Close</button>
                                </form>
                            @endif
                        @endif
                        <small>Status: {{$issue->status}}</small>
                    </div>
                    <div class="card-body ">
                        <p>{{$issue->body}}</p>


                    </div>
                </div>

                {{--  comments--}}

                @foreach($comments as $comment)

                    <div class="card m-3">
                        <div class="card-header">{{$comment['user']['name']}}
                            <small
                                class="text-muted float-right">{{ \Carbon\Carbon::parse($comment['created_at'])->format('H:i d/m/y') }}</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$comment['body']}}</p>
                        </div>
                    </div>
                @endforeach
                @if($issue->status == 'open')
                    {{--todo axios--}}
                    <form action="/issue-comments" method="post">
                        @csrf
                        <div class="form-group">
                        <textarea class="form-control mt-3" name="body" id="" rows="3" required
                                  placeholder="Leave a comment..."></textarea>
                        </div>
                        <input type="hidden" name="issue_id" value="{{$issue->id}}">
                        <input class="btn btn-secondary float-right" type="submit" name="" id="" value="Comment">
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
