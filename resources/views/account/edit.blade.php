@extends('layouts.main')

@section('container')
@foreach($user as $key)
<div class="col-12 ">
    <form action="/user/edit/{{ $key->id }}" method="POST" class="app-card app-card-account shadow-sm d-flex flex-column align-items-start" enctype="multipart/form-data">
        @csrf
        <div class="app-card-body px-4 w-100">
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label mb-2"><strong>Photo</strong></div>
                        <div class=""><img class="profile-image rounded-circle" src="{{ asset('storage/profile/'.$key->picture) }}" alt=""></div>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="btn-sm file-input-custom">
                            <input class="file-input-customize" type="file" name="picture" id="picture">
                            Change
                        </div>
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Name</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 @error('name') is-invalid @enderror" value="{{ $key->name }}" name="name" autofocus>
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Email</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 @error('email') is-invalid @enderror" value="{{ $key->email }}" name="email">
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Username</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 @error('username') is-invalid @enderror" value="{{ $key->username }}" name="username">
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Role</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0" disabled value=" {{ $key->level->level }}" name="level_id">
                    </div>
                </div>
            </div>
        </div>
        <div class="app-card-footer p-4 mt-auto">
            <button type="submit" class="btn btn-success text-white">Save Change</button>
            <a class="btn btn-danger text-white" href="/user/{{ $key->id }}">Cancel</a>
        </div>
    </form>
</div>
<script>
    const picture = document.getElementById('picture');
    const profile_image = document.querySelector('.profile-image');

    picture.addEventListener('change', function() {
        const files = picture.files[0];
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            profile_image.src = this.result;
        });
    });
</script>
@endforeach
@endsection