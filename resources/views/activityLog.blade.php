@extends('layouts.main')

@section('container')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card card-activity">
        <h4 class="card-title mb-5">Activity Log</h4>
        <div class="card-body">
        <ul class="bullet-line-list">
            @foreach ($data as $item)
            <li>
            <style>
                .bullet-line-list li:nth-child({{$loop->iteration}})::before {
                    background-image: url('/storage/profile/{{ $item->user->picture }}');
                    width: 40px;
                    height: 40px;
                    left: -50px;
                    top: -2px;
                    border: 4px solid #e9edfb;
                    z-index: 2;
                    background-size: cover;
                }
            </style>
            <div class="d-flex justify-content-between">
                <div><span class="text-light-green">{{ $item->user->name }} </span> &nbsp {{ $item->action }} <p class="small">{{ $item->user->level->level }}</p> </div>
                <p>{{ $item->created_at->diffForHumans() }}</p>
            </div>
            </li>
            @endforeach
        </ul>
        </div>
    </div>
</div>
@endsection