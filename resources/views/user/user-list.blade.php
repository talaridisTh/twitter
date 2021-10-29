<x-app-layout>
    <div class="container mx-auto mt-10">

        <ul class="grid grid-cols-1 gap-5 px-10">
            @foreach($users as $user)
                <li class="border p-10 flex items-center justify-around text-gray-200">
                    <img src="{{asset($user->photo)}}" class="object-cover inline-block h-32 w-32 rounded-full mr-40 "
                         alt="avatar">
                    <ul class="flex flex-col space-y-1 flex-1">
                        <x-user-info :user="$user"/>
                        <li>
                            <x-follow-button :user="$user" />
                        </li>
                    </ul>
                </li>
            @endforeach

        </ul>
        <div class="mt-5 px-10">
            {{$users->links()}}
        </div>


    </div>
</x-app-layout>
