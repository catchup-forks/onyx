<!DOCTYPE html>
<html lang="{{$globalLocale = Lang::getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/admin.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/colors.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/material-icons.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/font-awesome.min.css')}}" type="text/css">
    @stack('styles')
    <script type="text/javascript" src="{{asset('resources/assets/js/jquery-2.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/js/jquery.sticky.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/js/vue.min.js')}}"></script>
</head>
<body class="bg-grey-8" @if($globalLocale == 'ar') dir="rtl" @endif>
<nav class="navbar navbar-inverse bg-grey-1 fixed-top navbar-toggleable-xs navbar-toggleable-sm navbar-toggleable-md navbar-toggleable-lg navbar-toggleable-xl">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a href="{{url('admin')}}" class="navbar-brand">
                <img src="{{asset('resources/assets/img/logo-wide-sm.png')}}" alt="Onyx Logo" class="img-fluid">
            </a>
        </li>
        <li class="nav-item">
            <div class="btn btn-outline-secondary btn-sm mt-1 border-purple-6" data-toggle="collapse" data-target="#side-nav-sticky-wrapper">
                <i class="material-icons text-purple-6">menu</i>
            </div>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Username</a>
            <div class="dropdown-menu bg-grey-1">
                <a href="#" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="navbar-placeholder"></div>
<div class="row" id="main-row">
    <div class="bg-blue-grey-1" id="side-nav">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link active">Dashboard</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="collapse" data-target="#nav-inventory">{{trans('admin.inventory')}}</a>
                <div class="collapse navbar-collapse" id="nav-inventory">
                    <ul class="nav flex-column bg-blue-grey-2">
                        <li class="nav-item"><a class="nav-link" href="{{url('admin/category/list')}}">{{trans('admin.categories')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{trans('admin.items')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{trans('admin.products')}}</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="collapse" data-target="#nav-sales">{{trans('admin.sales')}}</a>
                <div id="nav-sales" class="collapse navbar-collapse">
                    <ul class="nav flex-column bg-blue-grey-2">
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.orders')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.clients')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.deliveries')}}</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="collapse" data-target="#nav-production">{{trans('admin.production')}}</a>
                <div id="nav-production" class="collapse navbar-collapse">
                    <ul class="nav flex-column bg-blue-grey-2">
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.purchases')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.suppliers')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.processes')}}</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="collapse" data-target="#nav-personnel">{{trans('admin.personnel')}}</a>
                <div id="nav-personnel" class="collapse navbar-collapse">
                    <ul class="nav flex-column bg-blue-grey-2">
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.roles')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.employees')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.payroll')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{trans('admin.leaves')}}</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="{{asset('resources/assets/js/admin.js')}}"></script>
<script type="text/javascript">
    $.ajaxSettings.headers = { 'X-CSRF-TOKEN': '{{csrf_token()}}' };
</script>
@stack('scripts')
</body>
</html>