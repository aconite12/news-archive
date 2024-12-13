<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Dashboard') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Search Form -->
                <form method="GET" action="{{ route('news.search') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="keyword" class="form-control" placeholder="Search by headline"
                                value="{{ request('keyword') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="author" class="form-control" placeholder="Search by author"
                                value="{{ request('author') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <!-- News Cards -->
                <div class="row">
                    @forelse($news as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $item->headline }}</h5>
                                    <p class="card-text">{{ Str::limit($item->content, 150, '...') }}</p>
                                    <p class="text-muted mb-1">
                                        <small>Author: {{ $item->author }}</small>
                                    </p>
                                    <p class="text-muted">
                                        <small>Date Published: {{ $item->date_published }}</small>
                                    </p>
                                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary btn-sm">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No news available.</p>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
