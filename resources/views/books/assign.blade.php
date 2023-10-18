@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Assign Book</h2>
                </div>
                <br>
                <div class="card-body">
                    <div class="alert alert-danger">
                        Available Copies: <span id="available-copies">{{ $availableCopiesCount }}</span>
                    </div>

                    <form method="POST" action="{{ route('books.assign-post', $book->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="reader_id">Select Reader</label>
                            <select name="reader_id" id="reader_id" class="form-control">
                                @foreach ($readers as $reader)
                                <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control">
                        </div>
                        <br>
                        @if ($availableCopiesCount > 0)
                        <button type="submit" class="btn btn-primary">Assign Book</button>
                        @else
                        <button type="button" class="btn btn-primary" disabled>Assign Book (No Copies
                            Available)</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection