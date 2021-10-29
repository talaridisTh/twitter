<li><a href="{{route('user.profile',$user->slug)}}">Username: <span class="font-bold text-gray-100">{{$user->username}}</span></a></li>
<li>Email: <span class="font-bold text-gray-100">{{$user->email}}</span></li>
<li>Count of total followers: <span class="font-bold text-gray-100">{{$user->countFollowers()}}</span></li>
<li>Count of total following : <span class="font-bold text-gray-100">{{$user->countFollowing()}}</span></li>
<p>Count of Posts: <span class="font-bold text-gray-100"> {{$user->countPosts()}}</span></p>