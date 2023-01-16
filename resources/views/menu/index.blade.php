@extends('layouts.main')

@section('container')
 
    <h1 class="app-page-title mb-2">All's Menu</h1>
    <div class="menu mb-4">
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#food">
                    <h4>Food</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#drink">
                    <h4>Drink's</h4>
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
        <div class="tab-pane fade active show" id="food">
            <div class="row g-4">
                @foreach ($foods as $food)
                <div class="col-6 col-md-4 col-xl-3 col-xxl-2 mb-4 mb-lg-0">
                    <div class="card rounded shadow-sm h-100 app-card-doc border-0 card-menu">
                        <div class="card-body p-4"><img src="{{ asset('storage/'. $food->picture) }}" alt="" class="img-fluid d-block mx-auto mb-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="col-11 text-banner">{{ $food->name }}</h5>
                                <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow mx-3" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;"></i>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"><i class="fa-solid fa-eye mx-2"></i> View</a></li>
                                                <li><a class="dropdown-item" href="menu/{{ $food->id }}/edit"><i class="fa-solid fa-pen-to-square mx-2"></i> Edit</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li class="delete">
                                                    <form action="/menu/{{ $food->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item border-0 bg-transparent" onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash-can mx-2"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                            <p class="small price">Rp <span class="nominal">{{ number_format($food->price,0,',','.') }}</span></p>
                            <div><span class="badge bg-success btn-ready">{{ $food->status }}</span></div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    
        <div class="tab-pane fade" id="drink">
            <div class="row g-4">
                @foreach ($drinks as $drink)
                <div class="col-6 col-md-4 col-xl-3 col-xxl-2 mb-4 mb-lg-0">
                    <div class="card rounded shadow-sm h-100 app-card-doc border-0 card-menu">
                        <div class="card-body p-4"><img src="/images/menu/{{ $drink->picture }}" alt="" class="img-fluid d-block mx-auto mb-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="col-11 text-banner">{{ $drink->name }}</h5>
                                <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow mx-3" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;"></i>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye mx-2"></i> View</a></li>
                                                <li><a class="dropdown-item" href="menu/{{ $drink->id }}/edit"><i class="fa-solid fa-pen-to-square mx-2"></i> Edit</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li class="delete"><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can mx-2"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                            <p class="small price">Rp<span class="nominal">{{ number_format($drink->price,0,',','.') }}</span></p>
                            <div class="mb-2"><strong>status :</strong> <span class="badge bg-success">{{ $drink->status }}</span></div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </div>
@endsection