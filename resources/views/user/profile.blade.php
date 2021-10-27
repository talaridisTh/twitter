<x-app-layout>
    <div class="container mx-auto mt-10">
        <ul class="space-y-4">
            <li>Username: {{$user->username}}</li>
            <li>Email: {{$user->email}}</li>
            <li>Count of total followers: {{$user->countFollowers()}}</li>
            <li>Count of total following : {{$user->countFollowing()}}</li>
            <p>Count of Posts: {{$user->countPosts()}}</p>
            <li>
                <h4 class="font-bold">Posts</h4>
                <ul class="space-y-3">
                    @foreach($user->posts as $key=> $post)
                        <li>({{$post->created_at}}) - {{$post->body}} </li>
                    @endforeach
                </ul>
            </li>
            @can('update', $user)
            <li>
                <form method="POST"
                      action="{{ route($user->isFollowing(), $user->slug) }}"
                >
                    @csrf
                    <button class="p-2 bg-blue-400 rounded text-white">{{$user->isFollowing()}}</button>
                </form>
            </li>
            @endcan
        </ul>


    </div>
</x-app-layout>
