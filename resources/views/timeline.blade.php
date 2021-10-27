<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
             class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-end p-6">
                <div class=" bg-white border-gray-200 items-end space-y-2 w-full">
                    <ul class="space-y-4">
                   @foreach($posts as $post )
                       <li class="border p-4">
                           <h3 class="text-blue-700 hover:text-blue-500 flex items-center space-x-4">
                               <a href="{{route('user.profile',$post->user->slug)}}">{{$post->user->username}}</a>
                               <p class="text-xs text-gray-400">({{$post->created_at}})</p>
                           </h3>
                           {{$post->body}}
                       </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
