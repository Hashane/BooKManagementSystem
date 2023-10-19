@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->hasRole('admin'))
    <a href="{{ route('books.create') }}" class="btn btn-success mb-4">
        <i class="fas fa-plus"></i> Create New Book
    </a>
    @endif

    <h2 class="mb-4">Book List</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publication Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
                        <a href="{{ route('books.assign-post', $book->id) }}" class="btn btn-info" title="Assign">
                            <i class="fa fa-tasks"></i> Assign
                        </a>
                        @endif
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary" title="View">
                            <i class="fa fa-eye"></i> View
                        </a>
                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning" title="Edit">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        @endif
                        @if (Auth::user()->hasRole('admin'))
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Delete"
                                onclick="return confirm('Are you sure you want to delete this book?')">
                                <i class="fa fa-trash-alt"></i> Delete
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection