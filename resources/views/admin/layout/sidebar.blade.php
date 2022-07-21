<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">

            <li class="nav-item @if(preg_match('/home/i',url()->current())) start active open @endif">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item @if(preg_match('/admins/i',url()->current())) start active open @endif">
                <a href="{{url(admin_admins_url())}}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Admins Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item @if(preg_match('/users/i',url()->current())) start active open @endif">
                <a href="{{url(admin_users_url())}}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Users</span>
                    <span class="selected"></span>
                </a>

            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-globe"></i>
                    <span class="title"> Web Contents </span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{url(admin_web_url().'/features')}}"> <i class="fa fa-newspaper-o"></i> Amazing
                            Features </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_web_url().'/stories')}}"> <i class="fa fa-forward"></i> Stories </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_web_url().'/media')}}"> <i class="fa fa-link"></i> Social Links </a>
                    </li>
                    <li class="">
                        <a href="#"> <i class="fa fa-question"></i> Faqs </a>
                        <ul class="sub-menu">

                            <li class="">
                                <a href="{{url(admin_web_url().'/questions')}}"> <i class="fa fa-question"></i> Questions </a>
                            </li>
                            <li class="">
                                <a href="{{url(admin_web_url().'/answers')}}"> <i class="fa fa-reply"></i> Answers </a>
                            </li>

                        </ul>
                    </li>
                    <li class="">
                        <a href="{{url(admin_web_url().'/settings-edit')}}"> <i class="fa fa-cog"></i> Settings </a>
                    </li>

                </ul>

            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title"> Constants </span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{url(admin_constants_url().'/subscriptions')}}"> <i class="fas fa-layer-group"></i>
                            Plans </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_constants_url().'/interests')}}"> <i class="fa fa-caret-up"></i>
                            Interests </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_constants_url().'/hobbies')}}"> <i class="fa fa-list"></i>
                            Hobbies </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_constants_url().'/religions')}}"> <i class="fa fa-globe"></i>
                            Religions </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_constants_url().'/countries')}}"> <i class="fa fa-map-marker"></i>
                            Countries </a>
                    </li>
                    <li class="">
                        <a href="{{url(admin_constants_url().'/cities')}}"> <i class="fa fa-map-marker"></i>
                            cities </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item @if(preg_match('/subscriptions_management/i',url()->current())) start active open @endif">
                <a href="{{url(admin_subscriptions_management_url())}}" class="nav-link nav-toggle">
                    <i class="fa fa-caret-up"></i>
                    <span class="title">Subscriptions</span>
                    <span class="selected"></span>
                </a>

            </li>
            <li class="nav-item @if(preg_match('/contactus/i',url()->current())) start active open @endif">
                <a href="{{url(admin_contactus_url())}}" class="nav-link nav-toggle">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Contact us</span>
                    <span class="selected"></span>
                </a>

            </li>
            <li class="nav-item @if(preg_match('/emailSubscriptions/i',url()->current())) start active open @endif">
                <a href="{{url(admin_Subscriptions_url())}}" class="nav-link nav-toggle">
{{--                    <i class="fas fa-envelope-open"></i>--}}
                    <i class="fa fa-reply"></i>
                    <span class="title">Notifications</span>
                    <span class="selected"></span>
                </a>

            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
