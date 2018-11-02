@php
    function refineTime($date){
        if (date('YMd',strtotime($date)) == date('YMd')){
            return (date('H:i',strtotime($date)));
        } elseif (date('Y',strtotime($date)) == date('Y')){
            return (date('M d ',strtotime($date)));
        } elseif (date('Y',strtotime($date)) !== date('Y')){
            return (date('M d, Y',strtotime($date)));
        }

        return date('M d, Y',strtotime($date));
    }
@endphp
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" id="css-main" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('/css/datatables.min.css')}}">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            @endauth
            @guest
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endguest
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            {{config('app.name')}}
        </div>

        <div class="links">
            @guest
                <a href="{{route('login')}}">Login</a>
                <a href="{{route('register')}}">Register</a>
            @endguest
            @auth
                <a href="javascript:void(0)" data-toggle="modal" data-target="#testModal">Take a test</a>
                <a href="{{url('/home')}}">View Dashboard</a>
            @endauth
            <a href="https://linkedin.com/nduovictor">About us</a>
            <a href="https://bitbucket.org/GreenWhiteDev/intelligentquiz">Source</a>
        </div>
        <div>

        </div>
        <div class="row my-5">
            <div class="col-md-7">
                <div class="card-title">
                    <h3>Users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{"$user->title $user->first_name $user->last_name"}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{refineTime($user->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-title">
                    <h3>Results</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-borderless table-hover table-striped col-12">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Score</th>
                            <th>Count</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($results as $result)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{"$result->score%"}}</td>
                                <td>{{$result->question_count }}</td>
                                <td>{{refineTime($result->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.modal')
<script src="{{asset('/js/codebase.min-1.4.js')}}"></script>
<script src="{{asset('/js/datatables.min.js')}}"></script>

<script>
    $('.table').DataTable();
</script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{csrf_field()}}
</form>
</body>
</html>
