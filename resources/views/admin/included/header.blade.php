<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{url('admin/dashboard')}}" class="logo logo-dark">
                     <span class="logo-sm">
                     <img src="{{Session::get('logo')}}" alt="" height="22" />
                     </span>
                    <span class="logo-lg">
                     <img src="{{Session::get('logo')}}" alt="" height="20" />
                     </span>
                </a>
                <a href="{{url('admin/dashboard')}}" class="logo logo-light">
                     <span class="logo-sm">
                     <img src="{{Session::get('logo')}}" alt="" height="22" />
                     </span>
                    <span class="logo-lg">
                     <img src="{{Session::get('logo')}}" alt="" height="20" />
                     </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" id="bell-button" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-bell"></i>
                    <span class="badge badge-danger badge-pill" id="ordercount">0</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown" id="notificationshow">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="red" id="notificationmsg"></p>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;"></div>
                    <div class="p-2 border-top"></div>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('public/upload/profile/').'/'.Sentinel::getUser()->profile_pic}}" alt="Header Avatar" />
                    <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{Session::get("username")}}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{url('admin/editprofile')}}"><i class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span class="align-middle">{{__("message.View Profile")}}</span></a>
                    <a class="dropdown-item" href="{{url('admin/changepassword')}}"><i class="mdi mdi-key font-size-18 align-middle text-muted mr-1"></i> <span class="align-middle">{{__("message.Change Password")}}</span></a>
                    <a class="dropdown-item" href="{{url('admin/setting')}}"><i class="uil uil-sliders-v-alt font-size-18 align-middle text-muted mr-1"></i> <span class="align-middle">{{__("message.Setting")}}</span></a>
                    <a class="dropdown-item" href="{{url('admin/logout')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">{{__("message.Sign out")}}</span></a>
                </div>
            </div>
            <div class="dropdown d-inline-block"></div>
        </div>
    </div>
</header>
