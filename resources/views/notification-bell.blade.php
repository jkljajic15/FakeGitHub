<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="{{Auth::user()->unreadNotifications->isEmpty() ? 'far fa-bell': 'fas fa-bell'}}"></i>
    </a>

    @if(Auth::user()->unreadNotifications)
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @forelse(Auth::user()->unreadNotifications as $notification)
                <li class="dropdown-item d-flex justify-content-between">
                    <span class=" text-muted ">
                        You have a new follower
                        <a href="/profile/{{$notification->data['id']}}">{{$notification->data['name']}}</a>
                    </span>

                    <a class="text-muted ml-4" href="{{route('markAsRead',$notification->id)}}">

                        <i class="fas fa-times"></i>
                    </a>

                </li>
                @empty
                <li class="dropdown-item">
                    <small class="text-muted">
                        No new notifications.
                    </small>
                </li>
            @endforelse
        </ul>
    @endif
</li>
