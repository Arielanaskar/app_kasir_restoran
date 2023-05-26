@extends('layouts.main')

@section('container')
<h1 class="app-page-title mb-4">Edit Employee</h1>
<div class="col-12 col-md-8">
    <div class="app-card-body">
        <form action="/user/{{ $users->id }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="setting-input-1" class="form-label">Username
                    <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span>
                </label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="setting-input-1" name="username" value="{{ old('username', $users->username) }}" required>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="setting-input-2" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="setting-input-2" name="name" value="{{ old('name', $users->name) }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="setting-input-3" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="setting-input-3" name="email" value="{{ old('email', $users->email) }}" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="setting-input-4" class="form-label">Role</label>
                <select class="form-select @error('level_id') is-invalid @enderror" id="setting-input-4" name="level_id" required>
                    @if ($users->level_id == 1)
                        <option value="1" selected>Manager</option>
                    @else
                        <option value="2" @if (old('level_id', $users->level_id) == "2" ) {{ 'selected' }} @endif>Cashier</option>
                        <option value="3" @if (old('level_id', $users->level_id) == "3" ) {{ 'selected' }} @endif>Admin</option>
                    @endif
                </select>
                @error('level_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn app-btn-primary w-100">Save Changes</button>
        </form>
    </div>
</div>
@endsection