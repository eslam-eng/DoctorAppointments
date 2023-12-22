<div class="vertical-menu">
    <div class="navbar-brand-box">
        <a href="<?php echo e(url('admin/dashboard')); ?>" class="logo logo-dark">
               <span class="logo-sm">
               <img src="<?php echo e(Session::get('logo')); ?>" alt="" height="22" />
               </span>
            <span class="logo-lg">
               <img src="<?php echo e(Session::get('logo')); ?>" alt="" height="20" />
               </span>
        </a>
        <a href="<?php echo e(url('admin/dashboard')); ?>" class="logo logo-light">
               <span class="logo-sm">
               <img src="<?php echo e(Session::get('logo')); ?>" alt="" height="22" />
               </span>
            <span class="logo-lg">
               <img src="<?php echo e(Session::get('logo')); ?>" alt="" height="20" />
               </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"><?php echo e(__("message.Menu")); ?></li>
                <li>
                    <a href="<?php echo e(url('admin/dashboard')); ?>">
                        <i class="uil-home-alt"></i><span class="badge badge-pill badge-primary float-right"></span>
                        <span><?php echo e(__("message.Dashboard")); ?></span>
                    </a>
                </li>
                <li class="menu-title"><?php echo e(__("message.Appointment")); ?></li>
                <li>
                    <a href="<?php echo e(url('admin/appointment')); ?>" class="waves-effect">
                        <i class="uil-shutter-alt"></i>
                        <span><?php echo e(__("message.Appointment")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/doctors')); ?>" class="waves-effect">
                        <i class="uil-flask"></i>
                        <span><?php echo e(__("message.Doctors")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/patients')); ?>" class="waves-effect">
                        <i class="uil-file-alt"></i>
                        <span><?php echo e(__('message.Patients')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/services')); ?>" class="waves-effect">
                        <i class="uil-adjust-alt"></i>
                        <span><?php echo e(__("message.Department")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/banner')); ?>" class="waves-effect">
                        <i class="uil-image"></i>
                        <span><?php echo e(__("message.banner")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/reviews')); ?>" class="waves-effect">
                        <i class="uil-star"></i>
                        <span><?php echo e(__("message.Review")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/complain')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.complain")); ?></span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="<?php echo e(url('admin/contact_list')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Contact")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/news')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.News")); ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('countries.index')); ?>" class="waves-effect">
                        <i class="uil-home"></i>
                        <span><?php echo e(__("message.countries_title")); ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('cities.index')); ?>" class="waves-effect">
                        <i class="uil-home"></i>
                        <span><?php echo e(__("message.cities_title")); ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('areas.index')); ?>" class="waves-effect">
                        <i class="uil-home"></i>
                        <span><?php echo e(__("message.areas")); ?></span>
                    </a>
                </li>
                <li class="menu-title"><?php echo e(__("message.branches")); ?></li>
                <li>
                    <a href="<?php echo e(route('branches.index')); ?>" class="waves-effect">
                        <i class="uil-home"></i>
                        <span><?php echo e(__("message.branches")); ?></span>
                    </a>
                </li>

                    <?php
                }?>
                <li class="menu-title"><?php echo e(__("message.Privecy")); ?></li>
                <li>
                    <a href="<?php echo e(url('admin/about')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.About")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/Terms_condition')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.term")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/app_privacy')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Privecy")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/data_deletion')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Data-Deletion")); ?></span>
                    </a>
                </li>

                <li class="menu-title">Reports</li>
                <li>
                    <a href="<?php echo e(route('doctor_report')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Doctors </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('user_report')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>User </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('do_sub_report')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Doctor Subscription </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('app_book_report')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Appointment booked </span>
                    </a>
                </li>

                <li class="menu-title"><?php echo e(__("message.Payment")); ?></li>
                <li>
                    <a href="<?php echo e(url('admin/pending_payment')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Pending Payment")); ?></span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="<?php echo e(route('Subscription')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Subscription")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/subscriber_doc')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Subscriber")); ?></span>
                    </a>
                </li>
                    <?php
                }?>
                <li>
                    <a href="<?php echo e(url('admin/complete_payment')); ?>" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?php echo e(__("message.Complete Payment")); ?></span>
                    </a>
                </li>
                <li class="menu-title"><?php echo e(__("message.Notification")); ?></li>
                <li>
                    <a href="<?php echo e(url('admin/sendnotification')); ?>" class="waves-effect">
                        <i class="uil-snapchat-ghost"></i>
                        <span><?php echo e(__("message.Send Notification")); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('admin/notificationkey')); ?>" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span><?php echo e(__("message.Notification Key")); ?></span>
                    </a>
                </li>
                <?php if(env('IS_FORNT')=="1")
                {
                    ?>
                <li>
                    <a href="<?php echo e(route('payment-setting')); ?>" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span><?php echo e(__("message.Payment Gateway")); ?></span>
                    </a>
                </li>
                    <?php
                }?>

            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/included/sidebar.blade.php ENDPATH**/ ?>