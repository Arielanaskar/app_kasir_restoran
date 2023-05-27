@extends('layouts.order')

@section('container')
    @php
        $tables = json_encode($tables);
        echo "
            <script>
                var tables = $tables;
            </script>
        ";
    @endphp
    <div class="col-md-8 p-0 h-100 flex flex-column justify-content-between">
        <div class="hd-menu d-flex align-items-center justify-content-between shadow bg-white">
            <div class="col-sm-5 d-flex align-items-center">
                <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"
                            d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </a>
                <h5 class="fs-5 fw-bold text-black ms-4">All Menu's</h5>
            </div>
            {{-- <div class="col-sm-7 d-flex align-items-center search-container-tr">
                <div class="search-mobile-trigger search-icon-transaction">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div>
                <div class="app-search-box sb-tr">
                    <form class="app-search-form">
                        <input type="text" placeholder="Search..." name="search" class="form-control search-input">
                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                class="fas fa-search"></i></button>
                    </form>
                </div>
            </div> --}}
        </div>
        <div class="wp-menu d-flex flex-column">
            <div class="menu-tr mt-3 mb-3">
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
            <div class="tab-content menu-tab overflow-auto" style="height: 85%" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="food">
                    <div class="menu-content pe-4 ps-4 d-flex flex-wrap justify-content-between">
                        @foreach ($foods as $food)
                            <div class="menu-item-cart rounded shadow d-flex align-items-center justify-content-around"
                                data-id="{{ $food->id }}" style="margin-bottom: 7%;">
                                <img class="img-fluid" src="{{ asset('storage/' . $food->picture) }}" alt=""
                                    srcset="" width="150">
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="product">
                                        <h5 style="font-size: 16px; width: 100px;" class="text-break">{{ $food->name }}</h5>
                                        <h6 style="font-size: 13px;">{{ number_format($food->price, 0, ',', '.') }}</h6>
                                    </div>
                                    <div class="qty d-flex mt-3">
                                        <button class="border-0 rounded bg-transparent RemovetoCart"><i
                                                class="fa-solid fa-minus" style="font-size: 12px;"></i></button>
                                        <div class="qty-numbers me-3 ms-3">
                                            0
                                        </div>
                                        <button class="border-0 rounded bg-transparent AddtoCart"><i
                                                class="fa-solid fa-plus" style="font-size: 12px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="drink">
                    <div class="menu-content pe-4 ps-4 d-flex flex-wrap justify-content-between">
                        @foreach ($drinks as $drink)
                            <div class="menu-item-cart rounded shadow d-flex align-items-center justify-content-around"
                                data-id="{{ $drink->id }}" style="margin-bottom: 7%;">
                                <img class="img-fluid" src="{{ asset('storage/' . $drink->picture) }}" alt=""
                                    srcset="" width="150">
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="product">
                                        <h5 style="font-size: 16px; width: 100px;" class="text-break">{{ $drink->name }}</h5>
                                        <h6 style="font-size: 13px;">{{ number_format($drink->price, 0, ',', '.') }}</h6>
                                    </div>
                                    <div class="qty d-flex mt-3">
                                        <button class="border-0 rounded bg-transparent RemovetoCart"><i
                                                class="fa-solid fa-minus" style="font-size: 12px;"></i></button>
                                        <div class="qty-numbers me-3 ms-3">
                                            0
                                        </div>
                                        <button class="border-0 rounded bg-transparent AddtoCart"><i
                                                class="fa-solid fa-plus" style="font-size: 12px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="dessert">
                    <div class="menu-content pe-4 ps-4 d-flex flex-wrap justify-content-between">
                        @foreach ($desserts as $dessert)
                            <div class="menu-item-cart rounded shadow d-flex align-items-center justify-content-around"
                                data-id="{{ $dessert->id }}" style="margin-bottom: 7%;">
                                <img class="img-fluid" src="{{ asset('storage/' . $dessert->picture) }}" alt=""
                                    srcset="" width="150">
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="product">
                                        <h5 style="font-size: 16px; width: 100px;" class="text-break">{{ $dessert->name }}</h5>
                                        <h6 style="font-size: 13px;">{{ number_format($dessert->price, 0, ',', '.') }}</h6>
                                    </div>
                                    <div class="qty d-flex mt-3">
                                        <button class="border-0 rounded bg-transparent RemovetoCart"><i
                                                class="fa-solid fa-minus" style="font-size: 12px;"></i></button>
                                        <div class="qty-numbers me-3 ms-3">
                                            0
                                        </div>
                                        <button class="border-0 rounded bg-transparent AddtoCart"><i
                                                class="fa-solid fa-plus" style="font-size: 12px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 h-100 p-0 d-flex flex-column">
        <div class="cart-title d-flex justify-content-between align-items-center p-4 shadow-sm">
            <h5 class="text-white">Current Order</h5>
            <button class="fas fa-broom text-white" onclick="deleteOrder()" role="button"></button>
        </div>
        <div class="cart-body d-flex flex-column justify-content-between" style="height: 780px;">
            <div class="d-flex justify-content-between p-3 align-items-center">
                <h6 class="fw-semibold text-white ms-2 tables-selected">Table</h6>
                <h6 class="fw-semibold text-white me-2" style="font-size: 13px;">{{ now()->format('Y-m-d') }}</h6>
            </div>
            <div class="list-order align-self-center rounded p-4 mb-4">
                <div class="menu-order">

                </div>
            </div>
            <form action="/transaction" method="POST" class="align-self-center p-0 m-0" style="width: 90%;">
                @csrf
                <input type="hidden" name="menu_id" id="menu_id">
                <input type="hidden" name="no_table" id="table_selected">
                <div class="cart-payment p-2 d-flex flex-column rounded">
                    <div class="subtotal d-flex justify-content-between align-items-center mt-3 p-2"
                        style="height: 40px;">
                        <h6 class="text-white">Subtotal</h6>
                        <h6 class="sub-total text-white">Rp 0</h6>
                    </div>
                    <div class="ppn d-flex justify-content-between align-items-center p-2" style="height: 40px;">
                        <h6 class="text-white">Ppn</h6>
                        <h6 class="text-white">10%</h6>
                        <input type="hidden" name="ppn" value="10%">
                    </div>
                    <hr class="mt-3 text-white">
                    <div class="section-transaction d-flex justify-content-between align-items-center p-2">
                        <h6 class="text-white">Total</h6>
                        <h6 class="total-transaction text-white">Rp 0</h6>
                        <input type="hidden" name="total_transaction">
                    </div>
                    <div class="section-pay d-flex justify-content-between align-items-center p-2">
                        <h6 class="text-white">Choose Table</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#table">chosee</button>
                    </div>
                </div>
                <button type="submit"
                    class="w-100 cart-order p-3 mt-3 mb-3 rounded text-center border-0 text-dark bg-white">
                    Place Order
                </button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="table" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl">
            <div class="modal-content shadow" style="background-color: #181818fd">
                <div class="modal-header" id="staticBackdropLabel">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Choose table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #fff"></button>
                </div>
                <div class="modal-body" style="background-image: url(/images/map-layout.png);">
                    <div class="row h-100">
                        <div class="col-9 p-0">
                            <div class="tables d-flex flex-column justify-content-between h-100">
                                <div class="top d-flex pb-5">
                                    <div class="d-flex justify-content-between align-items-center w-75">
                                        <div class="tab-container position-relative">
                                            <img class="table-A" src="/images/table/meja4.png" width="120"
                                                srcset="" data-table="not-selected" data-number="A1">
                                            <p
                                                class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                                A1</p>
                                        </div>
                                        <div class="tab-container position-relative">
                                            <img class="table-A" src="/images/table/meja4.png" width="120"
                                                srcset="" data-table="not-selected" data-number="A2">
                                            <p
                                                class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                                A2</p>
                                        </div>
                                        <div class="tab-container position-relative">
                                            <img class="table-B" src="/images/table/meja5.png" width="75"
                                                srcset="" data-table="not-selected" data-number="B1">
                                            <p
                                                class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                                B1</p>
                                        </div>
                                        <div class="tab-container position-relative">
                                            <img class="table-B" src="/images/table/meja5.png" width="75"
                                                srcset="" data-table="not-selected" data-number="B2">
                                            <p
                                                class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                                B2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="midle d-flex justify-content-between align-items-end mt-4">
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C1">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C1</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C2">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C2</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C3">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C3</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C4">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C4</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C5">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C5</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C1" src="/images/table/meja0.png" width="120"
                                            alt="" srcset="" data-table="not-selected" data-number="C6">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C6</p>
                                    </div>
                                </div>
                                <div class="bottom d-flex justify-content-between">
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C7">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C7</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C8">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C8</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C9">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C9</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C10">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C10</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C11">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C11</p>
                                    </div>
                                    <div class="tab-container position-relative">
                                        <img class="table-C2" src="/images/table/mejabottom.png" width="75"
                                            alt="" data-table="not-selected" data-number="C12">
                                        <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">
                                            C12</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-between align-items-end">
                            <div class="tab-container position-relative">
                                <img class="table-D" src="/images/table/meja3.png" width="80" alt=""
                                    srcset="" data-table="not-selected" data-number="D1">
                                <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">D1</p>
                            </div>
                            <div class="tab-container position-relative">
                                <img class="table-D" src="/images/table/meja3.png" width="80" alt=""
                                    srcset="" data-table="not-selected" data-number="D2">
                                <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">D2</p>
                            </div>
                            <div class="tab-container position-relative">
                                <img class="table-D" src="/images/table/meja3.png" width="80" alt=""
                                    srcset="" data-table="not-selected" data-number="D3">
                                <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">D3</p>
                            </div>
                            <div class="tab-container position-relative">
                                <img class="table-D" src="/images/table/meja3.png" width="80" alt=""
                                    srcset="" data-table="not-selected" data-number="D4">
                                <p class="position-absolute top-50 start-50 translate-middle fw-bold text-tables">D4</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Choose</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/order.js"></script>
    <script src="/js/formatmoney.js"></script>
@endsection
