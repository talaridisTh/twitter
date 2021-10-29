@foreach($users as $user)
    <li>
        <a class="flex items-center justify-between" href="{{route('user.profile',$user->slug)}}">
            <div class="flex items-center space-x-2">
                <img src="{{asset($user->photo)}}" class="object-cover inline-block h-10 w-10 rounded-full" alt="avatar">
                <p class="text-gray-200 hover:text-gray-400">{{$user->username}}</p>
            </div>
            <div>
                <x-follow-button :user="$user"/>
            </div>
        </a>
    </li>
@endforeach
<a class="text-blue-500 hover:text-blue-700" href="{{route('user.userList')}}">Show More</a>