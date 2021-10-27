<x-app-layout>
    <x-slot name="header">
        <section class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('TimeLine') }}
            </h2>
            <ul class="flex space-x-4">
                <li>
                    <a href="{{route('timeline')}}">Timeline</a>
                </li>
                <li>
                    <a href="#">My profile</a>
                </li>
                <li>
                    <a href="#">Post a tweet</a>
                </li>
                <li>
                    <a href="#">User list</a>
                </li>
            </ul>
        </section>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
