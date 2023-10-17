@extends('layouts.app')

@section('content')
<h1>Welcome, {{ Auth::user()->name }}</h1>
<p>This is the dashboard for {{ Auth::user()->hasRole('admin') ? 'Admin' : (Auth::user()->hasRole('editor') ? 'Editor' :
    'Viewer') }}.</p>

@if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
@include('books.index')
@endif

@if (Auth::user()->hasRole('reader'))
@include('borrowed_books')
@include('history')
@endif
@endsection