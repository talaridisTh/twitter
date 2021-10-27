<x-app-layout>
    <div class="container mx-auto mt-10">

        <ul class="grid grid-cols-4 gap-5">
            @foreach($users as $user)
                <li class="border p-10">
                    <a href="{{route('user.profile',$user->username)}}">{{$user->username}}</a>
                </li>
            @endforeach
        </ul>


    </div>
</x-app-layout>
