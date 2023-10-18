@section('content')
<div class="container">
    <h2 class="text-center mt-4 mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Books</h5>
                    <p class="card-text">View, Edit, and Delete Books.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Go to Book Management</a>
                </div>
            </div>
        </div>

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
    </div>
</div>
@endsection