@extends('layouts.main')

@section('container')
<div class="col d-flex align-items-center" style="border: 1px solid red;">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ asset('/') }}images/menu/{{ $menu->picture }}" alt="">
            </div>
            <div class="col-md-5 mt-4">
                <div class="card-body">
                <h5 class="card-title">{{ $menu->name }}</h5>
                <p class="card-text">Price : Rp.{{ $menu->price }}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('/') }}images/menu/{{ $menu->picture }}" alt="" class="img-fluid">
            </div>
            <div class="col-md">
                <ul class="list-group">
                    <li class="list-group-item">Nasi Bakar</li>
                    <li class="list-group-item">Rp 10000</li>
                    <li class="list-group-item">Ready</li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
@endsection
