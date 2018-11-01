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

<div class="row">
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-right mt-15 d-none d-sm-block">
                    <i class="si si-bag fa-2x text-primary-light"></i>
                </div>
                <div class="font-size-h3 font-w600 text-primary" data-toggle="countTo" data-speed="1000"
                     data-to="{{$testCount}}">0
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Tests Count</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-right mt-15 d-none d-sm-block">
                    <i class="si si-wallet fa-2x text-elegance-light"></i>
                </div>
                <div class="font-size-h3 font-w600 text-elegance"><span data-toggle="countTo"
                                                                        data-speed="1000"
                                                                        data-to="{{$averageScore}}">0</span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Average Score</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-right mt-15 d-none d-sm-block">
                    <i class="si si-envelope-open fa-2x text-pulse-light"></i>
                </div>
                <div class="font-size-h3 font-w600 text-pulse" data-toggle="countTo" data-speed="1000"
                     data-to="{{$lowestScore}}">0
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Lowest Score</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="float-right mt-15 d-none d-sm-block">
                    <i class="si si-users fa-2x text-earth-light"></i>
                </div>
                <div class="font-size-h3 font-w600 text-earth" data-toggle="countTo" data-speed="1000"
                     data-to="{{$highestScore}}">0
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Highest Score</div>
            </div>
        </a>
    </div>
</div>
<div class="row" id="tables">
    <div class="col-12">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default border-b">
                <h3 class="block-title">Your Test History</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-responsive table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Score</th>
                        <th>Count</th>
                        <th>Duration</th>
                        <th>Started at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($userResults as $result)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{"$result->score%"}}</td>
                            <td>{{$result->question_count }}</td>
                            <td>{{$result->duration}}</td>
                            <td>{{refineTime($result->started_at)}}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-danger"
                                   href="javascript:deleteTest('{{$result->result_id}}')"
                                   data-toggle="tooltip"
                                   title="Delete Test" data-original-title="Delete Test">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default border-b">
                <h3 class="block-title">Users</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-responsive table-borderless">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Phone No.</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->title}}</td>
                            <td>{{"$user->first_name $user->last_name"}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone_no}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default border-b">
                <h3 class="block-title">Results</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-responsive table-borderless">
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