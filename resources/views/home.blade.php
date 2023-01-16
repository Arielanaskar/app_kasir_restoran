@extends('layouts.main')

@section('container')

@dd($total_sale)
<div class="col-md-12 mb-4 grid-margin">
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome Ariel</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <div class="btn btn-sm btn-light">
                        <i class="fa-regular fa-calendar me-2"></i>{{  now()->shortEnglishDayOfWeek  }}, {{ now()->format('m Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card card-tale">
        <div class="card-people ">
            {{-- <img src="{{ asset('/') }}images/background/bg-dashboard.jpg"> --}}
            <div class="weather-info">
                <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i><sup>C</sup></h2>
                </div>
                <div class="ml-2">
                    <h4 class="location font-weight-normal">Depok</h4>
                    <h6 class="font-weight-normal">Indonesia</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin transparent">
    <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="small mt-2">Total’s Menu</p>
                    <p class="fs-3 mb-0">10</p>
                    <p>10.00% (30 days)</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="small mt-2">Total Sales (today)</p>
                    <p class="fs-3 mb-0">Rp 50.000</p>
                    <p>22.00% (30 days)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="small mt-2">Total Invoice (today)</p>
                    <p class="fs-3 mb-0">8</p>
                    <p>2.00% (30 days)</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="small mt-2">Number of Clients</p>
                    <p class="fs-3 mb-0">47033</p>
                    <p>0.22% (30 days)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection