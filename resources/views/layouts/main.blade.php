<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>
        {{ 
            Request::is('/') ? 'Dashboard' : 
            (Request::is('activityLog') ? 'ActivityLog' : 
            (Request::is('menu') ? 'Alls Menu' : 
            (Request::is('menu/create') ? 'Add New Menu' : 
            (Request::is('menu/*/edit') ? 'Edit Menu' : 
            (Request::is('transaction') ? 'Transaction' : 
            (Request::is('transaction/create') ? 'Make Order' : 
            (Request::is('user') ? 'Alls employee' : 
            (Request::is('user/create') ? 'Add New employee' :
            (Request::is('account') ? 'My Account' :
            (Request::is('user/*/edit') ? 'Edit employee' :
            (Request::is('user/edit/*') ? 'Edit Profile' :
            (Request::is('user/*') ? 'My Profile' :
            'appantuh'    
            ))))))))))))     
        }}
    </title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logofood.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link rel="stylesheet" href="/css/portal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.1-web/css/all.css">

    {{-- trix --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.umd.min.js"></script> 

    <style>
        /* trix css  */
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        trix-toolbar [data-trix-button-group="text-tools"] button[title="Link"] {
            display: none;
        }

        trix-toolbar [data-trix-button-group="block-tools"] button[title="Code"] {
            display: none;
        }

        trix-editor {
            background-color: #fff;
        }
    </style>

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
                @yield('section')
            </div>
        </div>
    </div>
    <script src="/js/jquery-3.6.3.min.js"></script>
    <script src="/plugins/popper.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <script src="/js/app.js"></script> 
    <script src="/js/password.js"></script> 
</body>