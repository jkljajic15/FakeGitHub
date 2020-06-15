
@if(!in_array($user->id,$followeeIds))
    <form action="/profile/{{$user->id}}" method="post">
        @csrf
        <button class="btn btn-primary" type="submit">Follow</button>
    </form>
@else
    <form action="/profile/{{$user->id}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-primary" type="submit">Unfollow</button>
    </form>
@endif


{{-- !in_array($user->id,$followeeIds) --}}
{{-- !isFollowing($user->id, $followeeIds) --}}
