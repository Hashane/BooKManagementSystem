@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create a New Book</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" required>
                            @error('author')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre:</label>
                            <select name="genre" id="genre" class="form-control">
                                <option value="">Select Genre</option>
                                @foreach(config('genres.genres') as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                            @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publication_year">Publication Year</label>
                            <input type="number" name="publication_year" id="publication_year" class="form-control"
                                required>
                            @error('publication_year')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"
                                required></textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count">Available Copies</label>
                            <input type="number" name="count" id="count" class="form-control" required>
                            @error('count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection