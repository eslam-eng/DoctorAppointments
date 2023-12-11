<div class="vertical-menu">
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
    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{__("message.Menu")}}</li>
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i class="uil-home-alt"></i><span class="badge badge-pill badge-primary float-right"></span>
                        <span>{{__("message.Dashboard")}}</span>
                    </a>
                </li>
                <li class="menu-title">{{__("message.Appointment")}}</li>
                <li>
                    <a href="{{url('admin/appointment')}}" class="waves-effect">
                        <i class="uil-shutter-alt"></i>
                        <span>{{__("message.Appointment")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/doctors')}}" class="waves-effect">
                        <i class="uil-flask"></i>
                        <span>{{__("message.Doctors")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/patients')}}" class="waves-effect">
                        <i class="uil-file-alt"></i>
                        <span>{{__('message.Patients')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/services')}}" class="waves-effect">
                        <i class="uil-adjust-alt"></i>
                        <span>{{__("message.Department")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/banner')}}" class="waves-effect">
                        <i class="uil-image"></i>
                        <span>{{__("message.banner")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/reviews')}}" class="waves-effect">
                        <i class="uil-star"></i>
                        <span>{{__("message.Review")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/complain')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.complain")}}</span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="{{url('admin/contact_list')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Contact")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/news')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.News")}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('countries.index')}}" class="waves-effect">
                        <i class="uil-home"></i>
                        <span>{{__("message.countries")}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('cities.index')}}" class="waves-effect">
                        <i class="uil-home"></i>
                        <span>{{__("message.cities")}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('areas.index')}}" class="waves-effect">
                        <i class="uil-home"></i>
                        <span>{{__("message.areas")}}</span>
                    </a>
                </li>

                    <?php
                }?>
                <li class="menu-title">{{__("message.Privecy")}}</li>
                <li>
                    <a href="{{url('admin/about')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.About")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/Terms_condition')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.term")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/app_privacy')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Privecy")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/data_deletion')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Data-Deletion")}}</span>
                    </a>
                </li>

                <li class="menu-title">Reports</li>
                <li>
                    <a href="{{route('doctor_report')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Doctors </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user_report')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>User </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('do_sub_report')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Doctor Subscription </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('app_book_report')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Appointment booked </span>
                    </a>
                </li>

                <li class="menu-title">{{__("message.Payment")}}</li>
                <li>
                    <a href="{{url('admin/pending_payment')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Pending Payment")}}</span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="{{route('Subscription')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Subscription")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/subscriber_doc')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Subscriber")}}</span>
                    </a>
                </li>
                    <?php
                }?>
                <li>
                    <a href="{{url('admin/complete_payment')}}" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>{{__("message.Complete Payment")}}</span>
                    </a>
                </li>
                <li class="menu-title">{{__("message.Notification")}}</li>
                <li>
                    <a href="{{url('admin/sendnotification')}}" class="waves-effect">
                        <i class="uil-snapchat-ghost"></i>
                        <span>{{__("message.Send Notification")}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/notificationkey')}}" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span>{{__("message.Notification Key")}}</span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="{{route('payment-setting')}}" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span>{{__("message.Payment Gateway")}}</span>
                    </a>
                </li>
                    <?php
                }?>

            </ul>
        </div>
    </div>
</div>
