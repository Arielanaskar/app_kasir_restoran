@extends('layouts.order')

@section('container')
<div class="row justify-content-center align-items-center">
    <div class="col-xl-12">
            <div class="row justify-content-around">
                
                <div class="col-md-5">
                    <div class="card border-0 ">
                        <div class="card-header card-2">
                            <p class="card-text text-muted mt-md-4  mb-2 space">LIST ORDER</p>
                            <hr class="my-2">
                        </div>
                        <div class="card-body pt-0">
                            <div style="max-height: 350px; overflow-y: auto; overflow-x: hidden;">
                            @foreach ($data as $key)
                                @foreach ($key->transaction_details as $item)
                                <div class="row  justify-content-between mb-3 pe-2">
                                    <div class="col-auto col-md-7">
                                        <div class="media flex-column flex-sm-row">
                                            <img class=" img-fluid" src="{{ asset('storage/'.$item->menu->picture) }}" width="62" height="62">
                                            <div class="media-body  my-auto">
                                                <div class="row ">
                                                    <div class="col-auto"><p class="mb-0"><b>{{ $item->menu->name }}</b></p><small class="text-muted">{{ $item->menu->category }}</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1">{{ $item->qty }}</p></div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b>{{ number_format($item->price, 0, ',', '.') }}</b></p></div>
                                </div>
                                @endforeach
                            @endforeach
                            </div>
                            <hr class="my-2">
                            @foreach ($data as $key)
                            <div class="row">
                                <div class="col">
                                    <div class="row justify-content-between mb-2">
                                        <div class="col-4"><p class="mb-1"><b>Subtotal</b></p></div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1">
                                                <b>
                                                    @php
                                                        $arr = [];
                                                        foreach($key->transaction_details as $item) {
                                                            $arr[] = $item->price;
                                                        };

                                                        function myfunction($v1,$v2)
                                                        {
                                                            return $v1 + $v2;
                                                        }

                                                        $total = array_reduce($arr, "myfunction");
                                                    @endphp

                                                    {{ number_format($total, 0, ',', '.') }}
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mb-2">
                                        <div class="col"><p class="mb-1"><b>Ppn</b></p></div>
                                        <div class="flex-sm-col col-auto"><p class="mb-1"><b>10%</b></p></div>
                                    </div>
                                    <div class="row justify-content-between mb-2">
                                        <div class="col-4"><p ><b>Total</b></p></div>
                                        <div class="flex-sm-col col-auto"><p  class="mb-1"><b>IDR {{ number_format($key->total_transaction, 0, ',', '.') }}</b></p> </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card border-0">
                        <div class="card-header pb-0">
                            <h2 class="card-title space ">Payment</h2>
                            <p class="card-text text-muted mt-4  space">PAYMENT DETAILS</p>
                            <hr class="my-0">
                        </div>
                        @foreach($data as $key)
                        @if($key->status == 'paid')
                        <div class="card-body">
                            <input type="hidden" name="id" id="id_transaction" value="{{ $key->id }}">
                            <div class="form-group mb-3">
                                <label for="name_cashier" class="small text-muted fw-semibold mb-1">NAME ON CASHIER</label>
                                <input type="text" class="form-control form-control-sm" disabled name="name_cashier" id="name_cashier" value="{{ $key->user->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_table" class="small text-muted fw-semibold mb-1">NO TABLE</label>
                                <input type="text" class="form-control form-control-sm" disabled name="no_table" id="no_table" value="{{ $key->no_table }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_transaction" class="small text-muted fw-semibold mb-1">TOTAL TRANSACTION</label>
                                <input type="text" class="form-control form-control-sm" disabled name="total_transaction" id="total_transaction" value="{{ number_format($key->total_transaction, 0, ',', '.') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_payment" class="small text-muted fw-semibold mb-1">TOTAL PAYMENT</label>
                                <input type="text" class="form-control form-control-sm" name="total_payment" value="{{ number_format($key->total_payment, 0, ',', '.') }}" id="price" disabled>
                            </div>
                            <div class="row mb-md-5 mt-4">
                                <div class="col">
                                    <a onclick="show_my_receipt1()" class="text-white btn btn-info w-100 btn-block ">Show Receipt</a>
                                </div>
                            </div>   
                        </div>

                        @else
                        <form action="/transaction/{{ $key->id }}" method="POST" class="card-body">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" id="id_transaction" value="{{ $key->id }}">
                            <div class="form-group mb-3">
                                <label for="name_cashier" class="small text-muted fw-semibold mb-1">NAME ON CASHIER</label>
                                <input type="text" class="form-control form-control-sm" disabled name="name_cashier" id="name_cashier" value="{{ $key->user->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_table" class="small text-muted fw-semibold mb-1">NO TABLE</label>
                                <input type="text" class="form-control form-control-sm" disabled name="no_table" id="no_table" value="{{ $key->no_table }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_transaction" class="small text-muted fw-semibold mb-1">TOTAL TRANSACTION</label>
                                <input type="text" class="form-control form-control-sm" disabled name="total_transaction" id="total_transaction" value="{{ number_format($key->total_transaction, 0, ',', '.') }}">
                                <input type="hidden" id="total" name="total_transaction" value="{{ $key->total_transaction }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_payment" class="small text-muted fw-semibold mb-1">TOTAL PAYMENT</label>
                                <input type="text" class="form-control form-control-sm total_payment @error('total_payment') is-invalid @enderror" id="price">
                                <input type="hidden" name="total_payment" id="total_payment">
                                @error('total_payment') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-md-5 mt-4">
                                <div class="col">
                                    <button type="submit" onclick="show_my_receipt2()" class="text-white btn btn-primary w-100 btn-block ">PAY {{ number_format($key->total_transaction, 0, ',', '.') }}</button>
                                </div>
                            </div>   
                        </form>
                        @endif
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const total_paymentFormat = document.querySelector('.total_payment');
    const total_paymentInput = document.getElementById('total_payment');

    total_paymentFormat.addEventListener('keyup', function() {
        total_paymentInput.value = parseInt(this.value.replace('.', ''));
    })

    function show_my_receipt1() {
        var page = '/invoice/'+ document.getElementById('id_transaction').value;
        var total_payment = document.getElementById("price");
        if (!total_payment.value) {
            return false;
        } else {
            localStorage.setItem('payment', total_payment.value)
            var myWindow = window.open(page, "_blank");
            myWindow.focus();
        }
    }

    function show_my_receipt2() {
        var page = '/invoice/'+ document.getElementById('id_transaction').value;
        var total_payment = parseInt(document.getElementById("price").value.replace('.',''));
        var total_transaction = parseInt(document.getElementById("total").value);
        if (total_payment < total_transaction) {
            return false;
        } else {
            localStorage.setItem('payment', document.getElementById("price").value)
            var myWindow = window.open(page, "_blank");
            myWindow.focus();
        }
    }
</script>
<script src="/js/formatmoney.js"></script>
@endsection