@extends('layouts.app')

@section('content')
<div class="container">
    <div id="message-container"></div>

    <h1>Users</h1>

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
                            <input class="form-check-input staff-checkbox" type="checkbox" data-id="{{ $staff->id }}" {{
                                $staff->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="staffStatus{{ $staff->id }}">Active</label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>

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
                            <input class="form-check-input reader-checkbox" type="checkbox" data-id="{{ $reader->id }}"
                                {{ $reader->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="readerStatus{{ $reader->id }}">Active</label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection


@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        // Function to handle checkbox changes
        function handleCheckboxChange(model, id, isChecked) {
            $.post('manage-users', {
                model: model,
                id: id,
                isChecked: isChecked,
            })
            .done(function (data) {
                console.log(data.message); 
                showMessage(data.message);
 
            })
            .fail(function (error) {
                console.error(error);
            });
        }

        function showMessage(message) {
    var alertElement = $('<div>').addClass('alert alert-success').html(message);
    $('#message-container').html(alertElement);
}

        // Add event listeners for staff checkboxes
        $('.staff-checkbox').on('change', function () {
            const staffId = $(this).data('id');
            const isChecked = $(this).is(':checked');
            handleCheckboxChange('staff', staffId, isChecked);
        });

        // Add event listeners for reader checkboxes
        $('.reader-checkbox').on('change', function () {
            const readerId = $(this).data('id');
            const isChecked = $(this).is(':checked');
            handleCheckboxChange('reader', readerId, isChecked);
        });
    });
</script>