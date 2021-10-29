<x-app-layout>
    <div class=" mt-10">
        <div class="flex justify-between border-b border-gray-300 border-gray-300 p-10 ">
            <img src="{{asset($user->photo)}}" class="inline-block h-32 w-32 object-cover rounded-full" alt="avatar">
            <x-upload-image :user="$user" />
        </div>
        <ul class="space-y-4 p-10 text-gray-200 text-lg">
           <x-user-info :user="$user"/>
            <li>
                <h4 class="font-bold text-lg text-gray-200 mb-3">Posts</h4>
                <ul class="space-y-3">
                    <x-post :posts="$posts" :show="false" />
                </ul>
            </li>
            @can('follow', $user)
                <x-follow-button :user="$user" />
            @endcan
        </ul>


    </div>
</x-app-layout>
