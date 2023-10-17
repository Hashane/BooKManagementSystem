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
                            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control"
                                value="{{ $book->author }}">
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" id="genre" class="form-control" value="{{ $book->genre }}">
                        </div>

                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $book->isbn }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"
                                rows="4">{{ $book->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="count">Available Copies</label>
                            <input type="number" name="count" id="count" class="form-control"
                                value="{{ $book->count }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection