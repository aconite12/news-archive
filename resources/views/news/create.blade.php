@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Create News</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('news.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="headline" class="form-label">Headline</label>
                    <input type="text" id="headline" name="headline" class="form-control" value="{{ old('headline') }}" maxlength="255" required>
                    @error('headline') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                    @error('content') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="date_published" class="form-label">Date Published</label>
                    <input type="date" id="date_published" name="date_published" class="form-control" value="{{ old('date_published') }}" required>
                    @error('date_published') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection