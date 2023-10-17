<!-- resources/views/sidebar.blade.php -->

<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Books Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.manage-users') }}">User Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.borrowed-books') }}">Borrowed Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.borrowing-history') }}">Borrowing History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Assign Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reader.borrowed-books') }}">Reader Borrowed Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reader.borrowing-history') }}">Reader Borrowing History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Return Books</a>
            </li>
        </ul>
    </div>
</nav>