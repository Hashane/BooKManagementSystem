@extends('layouts.app')

@section('content')
<div class="container">
    <div id="message-container"></div>
    <h1 class="mb-4">User Management</h1>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-staff-tab" data-bs-toggle="tab" data-bs-target="#nav-staff"
                type="button" role="tab" aria-controls="nav-staff" aria-selected="true">Staff Members</button>
            <button class="nav-link" id="nav-reader-tab" data-bs-toggle="tab" data-bs-target="#nav-readers"
                type="button" role="tab" aria-controls="nav-readers" aria-selected="false">Readers</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-staff" role="tabpanel" aria-labelledby="nav-staff-tab">
            <section class="user-section">
                <h2>Staff Members</h2>
                <form id="staffForm" action="/manage-users" method="POST">
                    @csrf
                    <input type="hidden" name="model" value="staff">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffMembers as $staff)
                            <tr>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input staff-checkbox" type="checkbox"
                                            data-id="{{ $staff->id }}" {{ $staff->active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="staffStatus{{ $staff->id }}">Active</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </section>
        </div>
        <div class="tab-pane fade" id="nav-readers" role="tabpanel" aria-labelledby="nav-reader-tab">
            <section class="user-section">
                <h2>Readers</h2>
                <form id="readerForm" action="/manage-users" method="POST">
                    @csrf
                    <input type="hidden" name="model" value="reader">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($readers as $reader)
                            <tr>
                                <td>{{ $reader->name }}</td>
                                <td>{{ $reader->email }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input reader-checkbox" type="checkbox"
                                            data-id="{{ $reader->id }}" {{ $reader->active ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="readerStatus{{ $reader->id }}">Active</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/manage-users.js') }}"></script>
</body>

</html>