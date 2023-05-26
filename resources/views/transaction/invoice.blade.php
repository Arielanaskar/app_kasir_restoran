<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logofood.ico"> 
    <title>Invoice</title>

    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link rel="stylesheet" href="/css/portal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.1-web/css/all.css">
</head>
<body>
    <div class="card">
        <div class="card-body mx-4">
            <div class="container">
            <p class="my-5 mb-0 text-center" style="font-size: 30px;">Foodoso</p>
            <p class="mt-0 mb-1 text-center" style="font-size: 15px;">Jl M. H. Thamrin, No. 9</p>
            <p class="mt-0 mb-4 text-center" style="font-size: 15px;">221-691-6080</p>
            @foreach ($data as $key)
                @php
                    $datetime = explode(' ', $key->created_at)[0];
                    $date = \Carbon\Carbon::parse($datetime);

                    $times_ex = explode(' ', $key->created_at)[1];
                    $times = \Carbon\Carbon::parse($times_ex);
                    $time = explode(' ', $times->toDayDateTimeString());
                @endphp
                <div class="row">
                    <ul class="list-unstyled">
                        <li class="text-black">Cashier &nbsp : &nbsp{{ $key->user->name }}</li>
                        <li class="text-muted mt-1"><span class="text-black">Table</span> {{ $key->no_table }}</li>
                        <li class="text-black mt-1">Date &nbsp : &nbsp {{ $date->toFormattedDateString() }} {{ $time[4].' '.$time[5] }}</li>
                    </ul>
                    <hr>
                    @foreach ($key->transaction_details as $item)
                    <div class="col-xl-10">
                        <p class="mb-0">{{ $item->menu->name }}</p>
                        <p class="small text-muted">{{ $item->qty }} x {{ $item->menu->price }}</p>
                    </div>
                    <div class="col-xl-2">
                        <p class="float-end">{{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div class="row text-black">
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

                    <div class="col-xl-12">
                        <p class="float-end fw-bold">SubTotal &nbsp: &nbsp &nbsp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-xl-12">
                        <p class="float-end fw-bold">PPN &nbsp: &nbsp &nbsp &nbsp 10%</p>
                    </div>
                    <div class="col-xl-12">
                        <p class="float-end fw-bold">Total &nbsp: &nbsp {{ number_format($key->total_transaction, 0,',','.') }}</p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div>
                <h2 class="float-end total-payment">{{ number_format($key->total_payment, 0, ',', '.') }}</h2>
            @endforeach
            <div class="text-center" style="margin-top: 90px;">
                <p class="mb-0 d-flex align-items-center justify-content-center"><u class="text-info text-decoration-none"><img src="/images/logofood.png" alt="" srcset="" width="20">Foodoso</u></p>
                <p>Thanks for joining us at Foodoso. </p>
            </div>

            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            let totalPayment = document.querySelector('.total-payment');

            if (totalPayment.innerText == '0') {
                totalPayment.innerText = localStorage.getItem('payment');
            } else {
                localStorage.clear();
                return false;
            }

            window.print();
        }
    </script>
</body>
</html>