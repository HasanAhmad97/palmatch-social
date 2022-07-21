@if(auth()->check())
    @include(layouts('site').'.header-profile')
@else
    {{--    padding-bottom:10px;border-bottom:1px solid rgba(255,255,255,.2);--}}
    <header
        @if(Route::currentRouteName()  != 'profile' &&  Route::currentRouteName() != 'forget' &&  Route::currentRouteName() != 'reset-password' &&  Route::currentRouteName() != 'contact-us')  style="padding-bottom:0px;border-bottom:0px solid rgba(255,255,255,.2);"
        @endif @if(Route::currentRouteName()  != 'home') id="innerHeader"
        @endif  @if(Route::currentRouteName()  == 'profile' ||  Route::currentRouteName() == 'forget'||  Route::currentRouteName() == 'reset-password'||  Route::currentRouteName() == 'contact-us')
        class="profileHeader" @endif>
        <div class="navbarCont">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg order-md-1">
                        <div class="col-lg-2 col-md-6">
                            <a class="navbar-brand" href="{{url('/')}}"><img src="{{assets('site')}}/images/logo.png"
                                                                             alt=""></a>
                        </div>
                        <div class="col-lg-6 col-md-6 order-lg-2 order-md-3">
                        </div>
                        <div class="col-lg-4 col-md-6  order-lg-3 order-md-2">
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
                                <a data-toggle="modal" data-target="#loginModal" class="btn SignIn">Sign In</a>
                                <a href="#" data-toggle="modal" data-target="#SignupModel" class="btn signIn">Sign
                                    Up</a>

                            </div>
                        </div>
                    </nav>
                </div>
                <div class="getMembership"><a href="javascript:;" data-toggle="modal" data-target="#Membership">Get a
                        membership</a></div>

            </div>
        </div>
        @if(Route::currentRouteName()  == 'profile' ||  Route::currentRouteName() == 'forget'||  Route::currentRouteName() == 'reset-password'||  Route::currentRouteName() == 'contact-us')
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="innerPageTitle">
                            <h2>{{$title}}</h2>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </header>

@endif
@if(Route::currentRouteName() == 'home' && !auth()->check())

    <section class="heroSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h1 class="heroText">Find your life partner</h1>
                    <div class="JoinBox">
                        <form action="" class="heroForm text-center">
                            <ul class="text-left">
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> seeking a </label>
                                        <div class="Rightside float-right">
                                            <label class="radioButtonContainer">Man
                                                <input type="radio" class="radioButton" name="gender">
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="radioButtonContainer">Women
                                                <input type="radio" class="radioButton" name="gender">
                                                <span class="checkmark"></span>
                                            </label></div>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> Age </label>
                                        <div class="Rightside float-right">
                                            <input type="text" class="form-control ageconttrol" placeholder="25">
                                            <span class="dash">-</span>
                                            <input type="text" class="form-control ageconttrol" placeholder="30">

                                        </div>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> country </label>
                                        <div class="Rightside float-right">
                                            <select name="" id="" class="select">
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{$country->id}}">{{$country->translation()->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <button type="submit" class="btn joinBtn">Join Now</button>
                        </form>


                    </div>
                </div>
                <div class="col-lg-7  col-md-6 col-12clearfix">
                    <div class="heroImg float-right">
                        <img src="{{assets('site')}}/images/twins.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
