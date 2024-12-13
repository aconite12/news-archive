<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            word-wrap: break-word;
        }

        .card p {
            font-size: 0.875rem;
            color: #555;
            margin-bottom: 0.5rem;
            word-wrap: break-word;
        }

        @media (max-width: 768px) {
            .card h3 {
                font-size: 1rem;
            }

            .card p {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <h1>News</h1>
        </div>
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </nav>
    </header>

    <main>
        <!-- Search Form -->
        <form method="GET" action="{{ route('search') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-10">
                    <input type="text" name="keyword" class="form-control" placeholder="Search news by keyword"
                        value="{{ request('keyword') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>
        <!-- News Cards -->
        @foreach ($news as $item)
            <div class="card">
                <h3>{{ $item->headline }}</h3>
                <p>{{ $item->content }}</p>
                <p><strong>Author:</strong> {{ $item->author }}</p>
                <p><strong>Date Published:</strong> {{ $item->date_published }}</p>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $news->links() }}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
