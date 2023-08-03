<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logofood.ico"> 
    <title>Report</title>

    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link rel="stylesheet" href="/css/portal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.1-web/css/all.css">
</head>
<body>
<div class="container">
        <div class="row my-5 d-flex flex-column justify-content-between">
            <div class="col d-flex flex-column align-items-center">
                <img src="/images/logofood.png" class="mb-3" alt="" srcset="" width="60">
                <h2>FOODOSO</h2>
                <p class="mb-1">Jl M. H. Thamrin, No. 9</p> 
                <p class="mb-1">221-691-6080</p>
            </div>
            <hr class="mt-3" style="border: 2px solid black;">
            <div class="col my-5">
                <h3 class="text-center">Transaction Report</h3>
                <p class="mb-0 text-center">For {{ isset($_GET['month']) && isset($_GET['year']) ? 'transactions in '.strftime('%B', mktime(0, 0, 0, $_GET['month'], 1)).' '.$_GET["year"] : (isset($_GET['month']) ? 'transactions in '.strftime('%B', mktime(0, 0, 0, $_GET['month'], 1)) : (isset($_GET['year']) ? 'transactions in '.$_GET["year"] : (isset($_GET["data"]) && $_GET["data"] == 'all' ?  'all transactions' : (isset($_GET["data"]) && $_GET["data"] == 'today' ? 'transactions today' : (isset($_GET["data"]) && $_GET["data"] == 'thisMonth' ? 'transactions this month' : 'bau' ))))) }}</p>
            </div>
        </div>
        <table class="table my-5">
            <thead>
            <tr>
                <th scope="col">Transaction date</th>
                <th scope="col">Product</th>
                <th scope="col">No Table</th>
                <th scope="col">Total</th>
                @can('manager')
                <th scope="col">Payment</th>
                <th scope="col">Profit</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @php
                $profit = [];
                $profit_items = 0;
            @endphp
            @foreach ($data as $item)
            @php
                foreach ($item->transaction_details as $key ) {
                    $profit_items += ($key->menu->price - $key->menu->modal) * $key->qty;
                }
                $profit[] = $profit_items;

                $total_profit = array_reduce($profit, "myfunction");
            @endphp
            <tr>
                <th scope="row">{{ $item->created_at->format('d M Y') }}</th>
                @can('manager')
                <td class="w-50">
                    @foreach ($item->transaction_details as $el)
                    {{ $el->menu->name.',' }}
                    @endforeach
                </td>
                @endcan
                @can('cashier')
                <td style="width: 70%;">
                    @foreach ($item->transaction_details as $el)
                    {{ $el->menu->name.',' }}
                    @endforeach
                </td>
                @endcan
                <td>{{ $item->no_table }}</td>
                <td>Rp. {{ number_format($item->total_transaction, 0, ',', '.') }}</td>
                @can('manager')
                <td>Rp. {{ number_format($item->total_payment, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($profit_items, 0, ',', '.') }}</td>
                @endcan
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            @php
                $arr_transaction = [];

                foreach($data as $item) {
                    $arr_transaction[] = $item->total_transaction;
                };
            
                function myfunction($v1,$v2)
                {
                    return $v1 + $v2;
                }

                $total_transaction = array_reduce($arr_transaction, "myfunction");
            @endphp
            <tr>
                @can('manager')
                <th colspan="5" class="text-end">Total revenue</th>
                <td>Rp. {{ number_format($total_transaction, 0, ',', '.') }}</td>
                @endcan

                @can('cashier')
                <th colspan="3" class="text-end">Total Transaction's</th>
                <td>Rp. {{ number_format($total_transaction, 0, ',', '.') }}</td>
                @endcan
            </tr>
            <tr>
                @can('manager')
                <th colspan="5" class="text-end">Total profit</th>
                <td>Rp. {{ number_format($total_profit, 0, ',', '.') }}</td>
                @endcan
            </tr>
            </tfoot>
        </table>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>