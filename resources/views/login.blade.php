<!DOCTYPE html>
<html lang="$locale">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/login.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('resources/assets/css/colors.min.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('resources/assets/js/jquery-2.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
</head>
<body class="bg-grey-1">
<div class="row">
    <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3" id="login">
        <div class="card bg-white border-purple-3">
            <div class="card-header bg-grey-9">
                <img src="{{asset('resources/assets/img/logo-wide-sm.png')}}" alt="Onyx Logo" class="d-block mx-auto img-fluid">
            </div>
            <div class="card-block">
                <form action="" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="row">
                        <div class="col-xs-12 form-group"><input type="text" class="form-control" name="username" placeholder="{{trans('login.username')}}"></div>
                        <div class="col-xs-12 form-group"><input type="password" class="form-control" name="password" placeholder="{{trans('login.password')}}"></div>
                        <div class="col-xs-12"><button class="btn btn-block btn-success" type="submit">{{trans('login.login')}}</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>