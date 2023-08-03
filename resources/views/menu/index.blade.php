@extends('layouts.main')
@section('container')
    <h1 class="app-page-title mb-2">All Menu's</h1>
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
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#dessert">
                    <h4>Dessert</h4>
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
                            <div class="card-body p-4"><img src="{{ asset('storage/' . $food->picture) }}" alt=""
                                    class="img-fluid d-block mx-auto mb-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="col-11 text-banner text-primary text-capitalize">{{ $food->name }}</h5>
                                    <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow mx-3" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;"></i>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" value="{{ $food->id }}" id="menu_id">
                                                <li>
                                                    <a class="dropdown-item" id="show-menu" class="btnbtn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#show" role="button"><i
                                                            class="fa-solid fa-eye mx-2"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="menu/{{ $food->id }}/edit"><i
                                                            class="fa-solid fa-pen-to-square mx-2"></i> Edit</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li class="delete">
                                                    <form action="/menu/{{ $food->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item border-0 bg-transparent"
                                                            onclick="return confirm('are you sure?')"><i
                                                                class="fa-solid fa-trash-can mx-2"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <p class="small price">IDR <span
                                        class="nominal">{{ number_format($food->price, 0, ',', '.') }}</span></p>
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
                            <div class="card-body p-4"><img src="{{ asset('storage/' . $drink->picture) }}" alt=""
                                    class="img-fluid d-block mx-auto mb-3">
                                <div class="d-flex justify-content-between">
                                <h5 class="col-11 text-banner text-primary text-capitalize">{{ $drink->name }}</h5>
                                    <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow mx-3" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;"></i>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" value="{{ $drink->id }}" id="menu_id">
                                                <li>
                                                    <a class="dropdown-item" id="show-menu" class="btnbtn-primary" data-bs-toggle="modal" data-bs-target="#show" role="button">
                                                        <i class="fa-solid fa-eye mx-2"></i> View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="menu/{{ $drink->id }}/edit">
                                                        <i class="fa-solid fa-pen-to-square mx-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li class="delete">
                                                    <form action="/menu/{{ $drink->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item border-0 bg-transparent"
                                                            onclick="return confirm('are you sure?')"><i
                                                                class="fa-solid fa-trash-can mx-2"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="small price">IDR <span
                                        class="nominal">{{ number_format($drink->price, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="dessert">
            <div class="row g-4">
                @foreach ($dessert as $item)
                    <div class="col-6 col-md-4 col-xl-3 col-xxl-2 mb-4 mb-lg-0">
                        <div class="card rounded shadow-sm h-100 app-card-doc border-0 card-menu">
                            <div class="card-body p-4"><img src="{{ asset('storage/' . $item->picture) }}" alt=""
                                    class="img-fluid d-block mx-auto mb-3">
                                <div class="d-flex justify-content-between">
                                <h5 class="col-11 text-banner text-primary text-capitalize">{{ $item->name }}</h5>
                                    <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow mx-3" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;"></i>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" value="{{ $item->id }}" id="menu_id">
                                                <li>
                                                    <a class="dropdown-item" id="show-menu" class="btnbtn-primary" data-bs-toggle="modal" data-bs-target="#show" role="button">
                                                        <i class="fa-solid fa-eye mx-2"></i> View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="menu/{{ $item->id }}/edit">
                                                        <i class="fa-solid fa-pen-to-square mx-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li class="delete">
                                                    <form action="/menu/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item border-0 bg-transparent"
                                                            onclick="return confirm('are you sure?')"><i
                                                                class="fa-solid fa-trash-can mx-2"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="small price">IDR <span
                                        class="nominal">{{ number_format($item->price, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="modal fade" style="margin-top: 9%; margin-left: 9%;" data-bs-backdrop="static" data-bs-keyboard="false"
            id="show" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0" id="menu-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery-3.6.3.min.js"></script>
    <script src="/js/show.js"></script>
@endsection
