<x-app-layout>
    <div class="container mx-auto mt-10">

        <ul class="grid grid-cols-4 gap-5">
            @foreach($users as $user)
                <li class="border p-10">
                    <a href="{{route('user.profile',$user->slug)}}">UserName : {{$user->slug}}</a>
                    <p>Follower: {{$user->countFollowers()}}</p>
                    <p>Following: {{$user->countFollowing()}}</p>
                    <p>Posts: {{$user->countPosts()}}</p>
                    <form method="POST"
                          action="{{ route($user->isFollowing(), $user->slug) }}"
                    >
                        @csrf
                        <button class="p-2 bg-blue-400 rounded text-white">{{$user->isFollowing()}}</button>
                    </form>
                </li>
            @endforeach
        </ul>


    </div>
</x-app-layout>
