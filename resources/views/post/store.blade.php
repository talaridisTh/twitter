<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data"
                  class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-end p-6">
                <div class=" bg-white border-gray-200 items-end space-y-2 w-full">
                    @csrf
                    <textarea name="body" id="body" class="w-full" cols="30" rows="10"></textarea>
                    @error("body" )
                    <p class="text-red-400">{{$message }}</p>
                    @enderror
                    @error("media" )
                    <p class="text-red-400">{{$message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between w-full">
                    <input name="media" type="file">
                    <button class="py-2 px-10 bg-blue-400 rounded-xl w-28 text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
