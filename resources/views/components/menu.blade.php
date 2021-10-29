
<ul class="flex  flex-col ">
    <li  class="p-2 hover:bg-gray-700 text-lg text-gray-200 rounded-xl mb-3 {{ request()->is('timeline*') ? 'bg-gray-700' : '' }}">
        <a href="{{route('timeline')}}">Timeline</a>
    </li>
    <li class="p-2 hover:bg-gray-700 text-lg text-gray-200 rounded-xl mb-3 {{ request()->is('profile/'.auth()->user()->slug) ? 'bg-gray-700' : '' }}">
        <a href="{{route('user.profile',auth()->user()->slug)}}">My Profile</a>
    </li>
    <li class="p-2 hover:bg-gray-700 text-lg text-gray-200 rounded-xl {{ request()->is('user-list*') ? 'bg-gray-700' : '' }}">
        <a href="{{route('user.userList')}}">User List</a>
    </li>
    <li class="p-2 text-white text-xl bg-blue-500 text-center rounded-full mt-10 transform transition hover:scale-95">
        <a href="{{route('post.create')}}">Tweet</a>
    </li>
</ul>