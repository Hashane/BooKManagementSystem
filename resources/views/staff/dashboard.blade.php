@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Welcome, {{ Auth::user()->name }}</h1>
    <p>This is the dashboard for {{ Auth::user()->hasRole('admin') ? 'Admin' : (Auth::user()->hasRole('editor') ?
        'Editor' : 'Viewer') }}.</p>

    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
    <div class="row mt-4">
        <div class="col-md-10">
            @include('layouts.cards')
        </div>
    </div>
    @endif

    @if (Auth::user()->hasRole('reader'))
    <div class="mt-4">
        <div class="row">
            <div class="col-md-6">
                @include('borrowed_books')
            </div>
            <div class="col-md-6">
                @include('history')
            </div>
        </div>
    </div>
    @endif
</div>
@endsection