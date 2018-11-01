<header id="page-header">
    <div class="content-header">
        <div class="content-header-section">
            <div class="content-header-item">
                <a class="link-effect font-w700 mr-5" href="{{url('')}}">
                    <i class="si si-fire text-primary"></i>
                    <span class="font-size-xl text-dual-primary-dark">{{config('app.name')}}</span>
                </a>
            </div>
        </div>
        <div class="content-header-section d-none d-lg-block">
            <ul class="nav-main-header">
                <li>
                    <a href="{{url('/home')}}"><i class="si si-compass"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{url()->previous()}}"><i class="si si-action-undo"></i>Go Back</a>
                </li>
            </ul>
        </div>
        <div class="content-header-section">
            <a class="btn btn-dual-secondary" data-action="header_search_on" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
</header>