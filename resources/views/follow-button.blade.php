
@if(!in_array($user->id,$followeeIds))
    <form action="/profile/{{$user->id}}" method="post">
        @csrf
        <button class="btn btn-primary float-right" type="submit">Follow</button>
    </form>
@else
    <form action="/profile/{{$user->id}}" method="post">
        @csrf
        @method('delete')
        <span><button class="btn btn-primary float-right" type="submit">Unfollow</button></span>
    </form>
@endif
