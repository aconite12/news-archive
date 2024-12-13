@extends('layouts.app')

@section('content')
<div class="container my-4">
    <style>
        .table td, .table th {
            white-space: normal;
            word-break: break-word;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6">News List</h1>
        <a href="{{ route('news.create') }}" class="btn btn-success">Create News</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Headline</th>
                    <th>Author</th>
                    <th>Date Published</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td style="max-width: 300px;">{{ $item->headline }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->date_published }}</td>
                    <td class="text-center">
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection