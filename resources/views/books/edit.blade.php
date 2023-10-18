@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Book</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $book->title) }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control"
                                value="{{ old('author', $book->author) }}">
                            @error('author')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre:</label>
                            <select name="genre" id="genre" class="form-control">
                                <option value="" {{ is_null(old('genre', $book->genre)) ? 'selected' : '' }}>Select
                                    Genre</option>
                                @foreach(config('genres.genres') as $genre)
                                <option value="{{ $genre }}" {{ $genre==old('genre', $book->genre) ? 'selected' : ''
                                    }}>{{ $genre }}</option>
                                @endforeach
                            </select>
                            @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">Publication Year</label>
                            <input type="text" name="year" id="year" class="form-control"
                                value="{{ old('year', $book->publication_year) }}">
                            @error('year')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"
                                rows="4">{{ old('description', $book->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count">Available Copies</label>
                            <input type="number" name="count" id="count" class="form-control"
                                value="{{ old('count', $book->count) }}">
                            @error('count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count">Published : {{ $book->created_at }}</label>
                        </div>
                        <div class="form-group">
                            <label for="count">Last Updated : {{ $book->updated_at }}</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection