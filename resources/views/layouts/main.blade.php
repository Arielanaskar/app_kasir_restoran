<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>
        {{ Request::is('/') ? 'Dashboard' : (Request::is('activityLog') ? 'ActivityLog' : (Request::is('menu') ? 'Alls Menu' : (Request::is('menu/create') ? 'Add New Menu' : (Request::is('menu/*/edit') ? 'Edit Menu' : 'appantuh')))) }}
    </title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link rel="stylesheet" href="/css/portal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.1-web/css/all.css">

</head> 

<body class="app">
    <header class="app-header fixed-top">   
        @include('layouts.header')
        @include('layouts.sidebar')
    </header>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-4 mb-4">
                    @yield('container')
                </div>
            </div>
        </div>
    </div>
    <script src="/plugins/popper.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <script src="/js/app.js"></script> 
</body>