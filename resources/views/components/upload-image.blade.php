@can('avatar', $user)
    <form method="post" action="{{route('user.avatar')}}" enctype="multipart/form-data"
          class="text-gray-200 shadow-sm sm:rounded-lg flex flex-col items-end p-6">
        @csrf
        <div class="flex justify-between w-full flex-col">
            <input name="media" type="file">
            <button class="py-2 mt-3 px-10 bg-blue-400 rounded-xl w-28 text-white">Save</button>
        </div>
    </form>
@endcan