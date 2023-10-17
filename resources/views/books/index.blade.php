@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Book List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publication Year</th>
                    <th>Action</th> <!-- Add a new column for edit actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('books.assign-post', $book->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary"> <i
                                class="fa fa-edit"></i></a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this book?')"> <i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection