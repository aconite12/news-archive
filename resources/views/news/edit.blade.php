@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News</h1>

    <form method="POST" action="{{ route('news.update', $news->id) }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="headline" class="form-label">Headline:</label>
            <input type="text" id="headline" name="headline" class="form-control" value="{{ old('headline', $news->headline) }}" required>
            @error('headline') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea id="content" name="content" class="form-control" required>{{ old('content', $news->content) }}</textarea>
            @error('content') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="date_published" class="form-label">Date Published:</label>
            <input type="date" id="date_published" name="date_published" class="form-control" value="{{ old('date_published', $news->date_published) }}" required>
            @error('date_published') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        
        <a href="{{ route('news.index') }}" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
