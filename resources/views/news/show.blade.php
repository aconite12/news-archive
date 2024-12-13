<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $news->headline }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 text-gray-900">
                        <p class="mt-4">{{ $news->content }}</p>
                        <p class="text-muted mt-4"><small>Author: {{ $news->author }}</small></p>
                        <p class="text-muted"><small>Date Published: {{ $news->date_published }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
