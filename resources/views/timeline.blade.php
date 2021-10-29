<x-app-layout>
    <div
     class="shadow-sm sm:rounded-lg flex flex-col items-end mt-2">
        <div class="border-gray-200 items-end space-y-2 w-full">
            <ul class="space-y-4">
                <x-post :posts="$posts" />
            </ul>
        </div>
    </div>
</x-app-layout>
