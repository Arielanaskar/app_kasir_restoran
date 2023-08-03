@extends('layouts.main')

@section('container')
    <h1 class="app-page-title mb-2">All Employee's</h1>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="/user/delete">
                        @csrf
                        <div class="table-wrap">
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="alert" role="alert">
                                            <td class="align-middle">
                                                @if ($user->level->id === auth()->user()->id)
                                                @else
                                                    @if ($user->level->id === 1)
                                                    <label class="checkbox-wrap checkbox-primary opacity-0 pe-none">
                                                        <input class="form-check-input text-info mt-0">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <a href="/user/{{ $user->id }}/edit" class="text-warning"><i
                                                            class="fa-regular fa-pen-to-square mb-1 ms-2"></i></a>
                                                    @else
                                                    <label class="checkbox-wrap checkbox-primary">
                                                        <input class="form-check-input text-info mt-0" type="checkbox"
                                                            name="users[]" data-role={{ $user->level->id }}
                                                            value="{{ $user->id }}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <a href="/user/{{ $user->id }}/edit" class="text-warning"><i
                                                            class="fa-regular fa-pen-to-square mb-1 ms-2"></i></a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <div class="img rounded-circle"
                                                    style="width: 50px; height: 50px; background-size: cover; background-position: center; background-image: url('<?= asset('storage/profile/' . $user->picture) ?>');">
                                                </div>
                                                <div class="d-flex flex-column ms-4">
                                                    <span class="small">{{ $user->email }}</span>
                                                    <span class="small">Added:
                                                        {{ $user->created_at->format('d/m/Y') }}</span>
                                                </div>
                                            </td>
                                            <td class="small align-middle">
                                                {{ $user->username === auth()->user()->username ? $user->username . '(You)' : $user->username }}
                                            </td>
                                            <td class="small align-middle level">{{ $user->level->level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="select-all" id="select-all">
                                <label class="form-check-label" for="select-all">
                                    Select All
                                </label>
                            </div>
                            <button type="submit" class="btn btn-danger" id="button">
                                <i class="fa fa-trash"></i>
                                Delete Selected (<span id="selected-count">0</span>)
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var checkboxes = document.getElementsByName('users[]');
        var deleteBtn = document.querySelector('#button');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var selectedCount = document.querySelectorAll('input[name="users[]"]:checked').length;
                document.getElementById('selected-count').textContent = selectedCount;
            });
        });

        document.getElementById('select-all').addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
            var selectedCount = event.target.checked ? checkboxes.length : 0;
            document.getElementById('selected-count').textContent = selectedCount;
        });

        deleteBtn.addEventListener('click', function(event) {
            var selectedUsers = document.querySelectorAll('input[name="users[]"]:checked');
            var selectedCount = selectedUsers.length;

            if (selectedCount === 0) {
                event.preventDefault();
                alert('Please select at least one employee to delete.');
            } else if (selectedUsers[0].dataset.role === '1') {
                event.preventDefault();
                alert('The manager role cannot be deleted, it can only be edited.');
            } else {
                var confirmation = confirm('Are you sure you want to delete ' + selectedCount +
                    ' selected employee(s)?');
                if (!confirmation) {
                    event.preventDefault();
                }
            }
        });
    </script>
@endsection
