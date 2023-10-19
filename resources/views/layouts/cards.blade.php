@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mt-4 mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Books</h5>
                    <p class="card-text">View | Edit @if (Auth::user()->hasRole('admin')) | Delete @endif Books.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Go to Book Management</a>
                </div>
            </div>
        </div>

        @if (Auth::user()->hasRole('admin'))
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Activate or Inactivate Staff/Reader Users.</p>
                    <a href="{{ route('staff.manage-users') }}" class="btn btn-primary">Go to User Management</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Borrowing History</h5>
                    <p class="card-text">View Borrowed Books.</p>
                    <a href="{{ route('staff.borrowed-books') }}" class="btn btn-primary">View Borrowed Books</a>
                </div>
            </div>
        </div>
        @endif
    </div>

    <br>
    @if (Auth::user()->hasRole('admin'))
    <style>
        /* Define a fixed width for the buttons */
        .btn1 {
            width: 100px;
            /* Adjust the width as needed */
        }
    </style>
    <div class="row justify-content-center">
        <!-- Center the table -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">API Requests</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>HTTP Method</th>
                                <th>Endpoint</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><button class="btn btn1 btn-success">GET</button></td>
                                <td>/api/staff/books</td>
                                <td>List of books</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn1 btn-warning">POST</button></td>
                                <td>/api/staff/books/{id}</td>
                                <td>Find a book by id</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn1 btn-warning">POST</button></td>
                                <td>/api/staff/books</td>
                                <td>Create a book</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn1  btn-info">PUT</button></td>
                                <td>/api/staff/books/{id}</td>
                                <td>Update a book</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn1  btn-danger">DELETE</button></td>
                                <td>/api/staff/books/{id}</td>
                                <td>Delete a book</td>
                            </tr>
                            <tr>
                                <td><button class="btn  btn1  btn-success">GET</button></td>
                                <td>/api/staff/users</td>
                                <td>List of staff members</td>
                            </tr>
                            <tr>
                                <td><button class="btn  btn1 btn-warning">POST</button></td>
                                <td>/api/staff/create-token</td>
                                <td>Staff token generation</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn1 btn-success">GET</button></td>
                                <td>/api/staff/readers</td>
                                <td>List of readers</td>
                            </tr>
                            <tr class="table-primary">
                                <td><button class="btn btn1 btn-success">GET</button></td>
                                <td>/api/reader/books/{id}</td>
                                <td>Find a book bt id</td>
                            </tr>
                            <tr class="table-primary">
                                <td><button class="btn btn1 btn-success">GET</button></td>
                                <td>/api/reader/books</td>
                                <td>List of books</td>
                            </tr>
                            <tr class="table-primary">
                                <td><button class="btn btn1 btn-warning">POST</button></td>
                                <td>/api/reader/create-token</td>
                                <td>Reader token generation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection