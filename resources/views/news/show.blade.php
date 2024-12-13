<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $news->headline }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <!-- News Content -->
                        <p class="mt-4 text-lg text-gray-700 leading-relaxed">
                            {{ $news->content }}
                        </p>
    
                        <!-- Author and Date Published -->
                        <div class="mt-6 text-gray-500">
                            <p><strong>Author:</strong> {{ $news->author }}</p>
                            <p><strong>Date Published:</strong> {{ $news->date_published }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
