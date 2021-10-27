<x-app-layout>
    <div class="container mx-auto mt-10">
        <ul>
            <li>Username: {{$user->username}}</li>
            <li>Email: {{$user->email}}</li>
            <li>Count of total followers: {{$user->countFollowers()}}</li>
            <li>Count of total following : {{$user->countFollowing()}}</li>
            <p>Count of Posts: {{$user->countPosts()}}</p>
            <li>
                <form method="POST"
                      action="{{ route($user->isFollowing(), $user->slug) }}"
                >
                    @csrf
                    <button class="p-2 bg-blue-400 rounded text-white">{{$user->isFollowing()}}</button>
                </form>
            </li>
        </ul>
    </div>
</x-app-layout>
