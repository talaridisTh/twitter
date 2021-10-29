@props(["show"=>true, "posts"=>null])
@foreach($posts as $post )
    <li class="border-t  p-10 flex  flex-col space-x-4">
            <div class="space-y-3">
                @if($show)
                <div class="flex items-center space-x-2">
                    <a class="flex items-center space-x-2" href="{{route('user.profile',$post->user->slug)}}">
                        <img src="{{asset($post->user->photo)}}" class="inline-block h-10 w-10 rounded-full"
                             alt="avatar">
                        <span class="text-lg text-gray-300 hover:text-gray-400">{{$post->user->username}}</span>
                    </a>
                    <p class="text-[10px] text-gray-400">( {{$post->created}} )</p>
                </div>
                @endif
                <img src="{{$post->photo}}" alt="">
            </div>
        <div class="text-lg text-gray-300 flex flex-col space-y-2">
            <p class="text-xs text-gray-500 mt-3">
                @if(!$show)
                    {{$post->created}}
                @endif
            </p>
            <div>
                {{$post->body}}
            </div>
        </div>
    </li>
@endforeach
<div class="p-4 ">
    {{$posts->links()}}
</div>