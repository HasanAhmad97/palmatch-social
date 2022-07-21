<header
    @if(Route::currentRouteName()  != 'profile' &&  Route::currentRouteName() != 'forget' &&  Route::currentRouteName() != 'reset-password' &&  Route::currentRouteName() != 'contact-us')  style="padding-bottom:0px;border-bottom:0px solid rgba(255,255,255,.2);"
    @endif @if(Route::currentRouteName()  != 'home') id="innerHeader"
    @endif  @if(Route::currentRouteName()  == 'profile' ||  Route::currentRouteName() == 'forget'||  Route::currentRouteName() == 'reset-password'||  Route::currentRouteName() == 'contact-us')
    class="profileHeader" @endif>
    <div class="navbarCont">
        <div class="container">
            <div class="justify-content-center">
                <nav class="navbar navbar-expand-lg  desktopNav ">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a class="navbar-brand" href="{{url('/')}}"><img src="{{assets('site')}}/images/logo.png"
                                                                             alt=""></a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="collapse navbar-collapse flex-row-reverse">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i>
                                            Home </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('discover')}}"><i
                                                class="fas fa-binoculars"></i>Discover</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('chat')}}"><i
                                                class="fas fa-comments"></i>Chat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('likes')}}"><i
                                                class="fas fa-heart"></i>Likes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('search')}}"><i
                                                class="fas fa-search"></i>Search</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="signInSection ">
                                <div class="languge dropdown">

                                    <div class="btn-group btn-group-solid">
                                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-horizontal"></i> @if(session()->has('locale')) {{session()->get('locale')}} @else En @endif
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach(config('languages.supported') as $lang)

                                                <li>
                                                    <a class="dropdown-item" href="{{url('lang/'.$lang)}}"> {{ucfirst($lang)}} </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                                <div class="profilSec">
                                    <a class="profile dropdown" href="#" role="button" id="ProfileDropdown"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profImg">
                                            <img src="{{user()->photo}}" alt="">
                                        </div>
                                        <div class="profName">
                                            <p>welcome</p>
                                            <h4>{{user()->name}}</h4>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="ProfileDropdown">
                                        <li>
                                            <a href="#"> <i class="fas fa-bell"></i> Notification</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-toggle="modal" data-target="#Membership"><i
                                                    class="fas fa-medal"></i>
                                                Upgrade</a>

                                        </li>
                                        <li>
                                            <a href="{{url('profile')}}"><i class="fas fa-user"></i>Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile')}}"><i class="fas fa-pencil-alt"></i>Edit
                                                Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('reset-password')}}"><i class="fas fa-lock"></i> Change
                                                Password</a>
                                        </li>
                                        <li>
                                            <a href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i>LogOut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
                <nav class="navbar navbar-expand-lg mobilenav clearfix">
                    <a class="navbar-brand" href="index.html"><img src="{{assets('site')}}/images/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MobileNavBar"
                            aria-controls="MobileNavBar" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="mobileMenu"><i></i><i></i><i></i></div>
                    </button>
                    <div class="collapse navbar-collapse" id="MobileNavBar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="Discover.html"><i
                                        class="fas fa-binoculars"></i>Discover</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="chat.html"><i class="fas fa-comments"></i>Chat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="likes.html"><i class="fas fa-heart"></i>Likes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search.html"><i class="fas fa-search"></i>Search</a>
                            </li>

                        </ul>

                    </div>
                    <div class="signInSection">
                        <div class="languge dropdown">

                            @foreach(config('languages.supported') as $lang)
                                @if(session()->has('locale') && session()->get('locale') ==  $lang)
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ucfirst($lang)}}
                                    </a>
                                @else
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item"
                                           href="{{url('lang/'.$lang)}}">{{ucfirst($lang)}}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="profilSec">
                            <a class="profile dropdown" href="#" role="button" id="ProfileDropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="profImg">
                                    <img src="{{assets('site')}}/images/uploadImg.png" alt="">
                                </div>
                                <div class="profName">
                                    <p>welcome</p>
                                    <h4>Ibrahim Jalal</h4>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="ProfileDropdown">
                                <li>
                                    <a href="#"> <i class="fas fa-bell"></i> Notification</a>
                                </li>
                                <li>
                                    <a href="javaScript:;" data-toggle="modal" data-target="#Membership"><i
                                            class="fas fa-medal"></i>
                                        Upgrade</a>

                                </li>
                                <li>
                                    <a href="profile.html"><i class="fas fa-user"></i>Profile</a>
                                </li>
                                <li>
                                    <a href="editProfile.html"><i class="fas fa-pencil-alt"></i>Edit Profile</a>
                                </li>
                                <li>
                                    <a href="changePassword.html"><i class="fas fa-lock"></i> Change Password</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-sign-out-alt"></i>LogOut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @if(Route::currentRouteName()  == 'profile' ||  Route::currentRouteName() == 'forget'||  Route::currentRouteName() == 'reset-password'||  Route::currentRouteName() == 'contact-us')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerPageTitle">
                        <h2>{{$title}}</h2>
                        {{--                        <a href="#" class="btn joinBtn float-right"> Save </a>--}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</header>
