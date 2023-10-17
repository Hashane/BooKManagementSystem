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
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publication_year }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection