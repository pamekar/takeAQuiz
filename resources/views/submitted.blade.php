@extends('layouts.dashboard')
@section('title',$title)
@section('content')
    <div class="bg-image" style="background-image: url('{{$public}}/dashboard/jpg/photo2%402x.jpg');">
        <div class="hero bg-primary-dark-op">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    @if(isset($error))
                        <h1 class="display-4 font-w700 text-white mb-10 js-appear-enabled animated fadeInDown"
                            data-toggle="appear" data-class="animated fadeInDown">{{$error}}</h1>
                    @else
                        <h1 class="display-4 font-w700 text-white mb-10 js-appear-enabled animated fadeInDown"
                            data-toggle="appear" data-class="animated fadeInDown">Your Test has been submitted
                            successfully..</h1>
                        <h2 class="font-w400 text-white-op mb-50 js-appear-enabled animated fadeInUp"
                            data-toggle="appear" data-class="animated fadeInUp" data-timeout="250">
                            {!! $result !!}
                        </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection