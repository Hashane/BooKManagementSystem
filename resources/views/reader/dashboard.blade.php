@extends('layouts.app')
@section('content')
<div class="text-center mt-4 mb-4">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>This is the dashboard for reader</p>
</div>
<div class="container">
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
                @foreach($assignments as $assm)
                <tr>
                    <td>{{ $assm->book->title }}</td>
                    <td>{{ $assm->book->author }}</td>
                    <td>{{ $assm->book->publication_year }}</td>
                    <td>
                        <a href="{{ route('books.show-reader', $assm->book->id) }}" class="btn btn-primary"
                            title="View">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection