<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Title</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $book->title }}</p>
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Category</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $book->category->name }}</p>
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Description
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $book->description }}</p>
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Quantity</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $book->quantity }}</p>
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">File</h5>
                        <iframe class="w-full h-screen mt-2" src="{{ $book->file_url }}" frameborder="0"></iframe>
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Cover</h5>
                        <img class="h-auto max-w-full" src="{{ $book->cover_url }}" alt="cover">
                    </div>
                    <div
                        class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $book->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
