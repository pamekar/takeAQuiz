<nav id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <div class="content-header content-header-fullrow bg-black-op-10">
                <div class="content-header-section text-center align-parent">
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="index-2.html">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-primary">{{config('app.name')}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="{{url('/home')}}"><i class="si si-compass"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url()->previous()}}"><i class="si si-action-undo"></i>Go Back</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#testModal"><i class="si si-notebook"></i>Take Test</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>