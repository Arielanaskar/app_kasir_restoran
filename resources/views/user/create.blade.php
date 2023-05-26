@extends('layouts.main')

@section('container')
    <h1 class="app-page-title mb-4">Add New Employee</h1>
    <div class="col-12 col-md-8">
        <div class="app-card-body">
            <form action="/user" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Username
                        <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span>
                    </label>
                    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="setting-input-1" name="username" value="{{ old('username') }}" required>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="setting-input-2" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="setting-input-3" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <div class="input-group d-flex align-items-center" id="show_hide_password">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
                        <div class="input-group-addon">
                            <a href="" class="bg-white p-2 border rounded-end">
                                <i class="fa-solid fa-eye-slash" id="icon-password" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="setting-input-4" class="form-label">Role</label>
                    <select class="form-select @error('level_id') is-invalid @enderror" id="setting-input-4" name="level_id" required>
                        <option selected disabled hidden>- select role -</option>
                        <option value="2"  @if (old('level_id') == "2") {{ 'selected' }} @endif >Cashier</option>
                        <option value="3"  @if (old('level_id') == "3") {{ 'selected' }} @endif >Admin</option>
                    </select>
                    @error('level_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn app-btn-primary w-100">Add to Employee</button>
            </form>
        </div>
    </div>
@endsection