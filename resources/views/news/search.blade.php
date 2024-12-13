@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Search Results</h1>

        <!-- Display Results -->
        @if ($news->isEmpty())
            <p>No results found.</p>
        @else
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->headline }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>
                                <p class="text-muted">
                                    Author: {{ $item->author }} <br>
                                    Date Published: {{ $item->date_published }}
                                </p>
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links() }}
            </div>
        @endif
    </div>
@endsection
