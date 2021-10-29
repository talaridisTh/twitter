<x-app-layout>
    <div class="container mx-auto mt-10">
        <img src="{{$user->photo}}" class="mb-3" alt="">
        @can('avatar', $user)
        <form method="post" action="{{route('user.avatar')}}" enctype="multipart/form-data"
              class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-end p-6">
                @csrf
            <div class="flex justify-between w-full">
                <input name="media" type="file">
                <button class="py-2 px-10 bg-blue-400 rounded-xl w-28 text-white">Save</button>
            </div>
        </form>
        @endcan
        <ul class="space-y-4">
            <li>Username: {{$user->username}}</li>
            <li>Email: {{$user->email}}</li>
            <li>Count of total followers: {{$user->countFollowers()}}</li>
            <li>Count of total following : {{$user->countFollowing()}}</li>
            <p>Count of Posts: {{$user->countPosts()}}</p>
            <li>
                <h4 class="font-bold">Posts</h4>
                <ul class="space-y-3">
                    @foreach($posts as $key=> $post)
                        <img src="{{$post->media?->path}}" alt="">
                        <li>({{$post->created_at}}) - {{$post->body}} </li>
                    @endforeach
                    {{ $posts->links() }}
                </ul>
            </li>
            @can('follow', $user)
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
