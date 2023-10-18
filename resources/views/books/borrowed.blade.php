@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Borrowed Books</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Reader</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedBooks as $assignedBook)
                                <tr>
                                    <td>{{ $assignedBook->book->title }}</td>
                                    <td>{{ $assignedBook->reader->name }}</td>
                                    <td>{{ $assignedBook->due_date }}</td>
                                    <td>
                                        @if (!$assignedBook->returned)
                                        <form method="POST" action="{{ route('books.return', $assignedBook) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Mark Returned</button>
                                        </form>
                                        @else
                                        <span class="text-success">Returned</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection