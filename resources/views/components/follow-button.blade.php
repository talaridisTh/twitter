<form method="POST"
      action="{{ route($user->isFollowing(), $user->slug) }}"
>
    @csrf
    <button id="follow-btn" class="p-2 bg-blue-400 rounded text-white">{{$user->isFollowing()}}</button>
</form>