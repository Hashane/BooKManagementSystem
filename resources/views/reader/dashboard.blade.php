@extends('layouts.app')

@section('content')
<h1>Welcome, {{ Auth::user()->name }}</h1>
<p>This is the dashboard for {{ Auth::user()->hasRole('admin') ? 'Admin' : (Auth::user()->hasRole('editor') ? 'Editor' :
    'Viewer') }}.</p>
@endsection