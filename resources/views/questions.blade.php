@php    $public='';    if(config('app.env') == 'production')    $public ='public'; @endphp
@extends('layouts.dashboard')
@section('title',$title)
@section('styles')
    <style>
        .timer div {
            float: left;
        }
    </style>
@endsection
@section('content')
    <main id="main-container" style="min-height: 258px;">
        <form action="{{url('/jobs/test/submit')}}" method="post" id="questions-form">
            {{csrf_field()}}
            <input type="hidden" name="rid" value="{{$result->result_id}}">
            <input type="hidden" name="tid" value="{{$test->test_id}}">
            <div class="content content-full">
                <div class="row gutters-tiny js-appear-enabled animated fadeIn" data-toggle="appear">
                    <div class="block block-mode-loading-refresh col-12">
                        <table class="table">
                            <tr>
                                <td style="text-align:center;">Title</td>
                                <td>Time left</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <span class="text-success font-size-h1 font-w600">{{$title}}</span>
                                </td>
                                <td>
                                    <span class="text-danger timer font-size-h1 font-w600"
                                          data-minutes-left={{$test->duration}}></span>
                                </td>
                                <td style="vertical-align: middle; text-align: center">
                                    <input type="submit" value="Submit" class="btn btn-primary btn-lg">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="block block-bordered block-mode-loading-refresh">
                        <div class="col-sm-12 col-xs-12">
                            <div class="block">
                                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                                    @for($i=1;$i<=sizeof($questions);$i++)
                                        <li class="nav-item">
                                            <a class="nav-link @if($i==1) active @endif"
                                               href="#question-{{$i}}">Q{{$i}}</a>
                                        </li>
                                    @endfor
                                </ul>
                                <div class="block-content tab-content">
                                    @php
                                        $j=1;
                                    @endphp
                                    @foreach($questions as $question)
                                        <div class="tab-pane @if($j==1) active @endif" id="question-{{$j}}"
                                             role="tabpanel">
                                            <h1 class="font-size-h3 font-w600">Question {{$j}}</h1>
                                            <div class="font-size-h3 font-w400">{{$question->question}}</div>
                                            <hr>
                                            <h2 class="font-size-h3 font-w600">Options</h2>
                                            <div class="form-group list-group">
                                                <label class="css-control css-control-primary css-radio block block-bordered list-group-item p-3">
                                                    <input class="css-control-input" name="{{$question->question_id}}"
                                                           type="radio" value="a">
                                                    <span class="css-control-indicator"></span> {{$question->option_a}}
                                                </label>
                                                <label class="css-control css-control-primary css-radio block block-bordered list-group-item p-3">
                                                    <input class="css-control-input" name="{{$question->question_id}}"
                                                           type="radio" value="b">
                                                    <span class="css-control-indicator"></span> {{$question->option_b}}
                                                </label>
                                                <label class="css-control css-control-primary css-radio block block-bordered list-group-item p-3">
                                                    <input class="css-control-input" name="{{$question->question_id}}"
                                                           type="radio" value="c">
                                                    <span class="css-control-indicator"></span> {{$question->option_c}}
                                                </label>
                                                <label class="css-control css-control-primary css-radio block block-bordered list-group-item p-3">
                                                    <input class="css-control-input" name="{{$question->question_id}}"
                                                           type="radio" value="d">
                                                    <span class="css-control-indicator"></span> {{$question->option_d}}
                                                </label>
                                                <label>{{$question->answer}}</label>
                                            </div>

                                        </div>
                                        @php
                                            $j++;
                                        @endphp

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
@section('scripts')
    <script src="{{asset($public.'/dashboard/js/jquery.simple.timer.js')}}"></script>
    <script>
        window.setInterval(submitQuestions, 1000);
        function submitQuestions(){
            var form = $('#questions-form');

            var data = new FormData(form);

            $.ajax({
                url: form.action,
                method: form.method,
                contentType: false,
                data: data,
                processData: false,
                success: function (result) {

                },
                error: function () {

                }
            });
            return false;
        }

        $('.timer').startTimer({
            onComplete: function(element){
                element.addClass('is-complete');
                swal('Your Time is UP', {
                    icon: 'error',
                });
                $('#questions-form').submit();
            }
        });
    </script>
@endsection