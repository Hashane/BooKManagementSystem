@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Assign Book</h2>
                </div>
                <div class="card-body">
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

                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Assign Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection