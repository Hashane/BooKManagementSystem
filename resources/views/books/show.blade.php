@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $book->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/book.png') }}" alt="{{ $book->title }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Title:</strong> {{ $book->title }}</p>
                            <p><strong>Author:</strong> {{ $book->author }}</p>
                            <p><strong>Genre:</strong> {{ $book->genre }}</p>
                            <p><strong>BK:</strong> {{ $book->isbn }}</p>
                            <p><strong>Available Copies:</strong> {{ $book->count }}</p>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Description:</strong> {{ $book->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection