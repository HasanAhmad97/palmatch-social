@extends(layouts('site').'.index')

@section('css')
    <style>
        #slider {
            width: 80%;
            margin-left: 1em;
        }

        #min,
        #max {
            position: absolute !important;

        }
    </style>
@endsection
@section('content')

    <!--Start Counters Section-->
    <section class="counters">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="counterBox">
                        <div class="counterImg">
                            <img src="{{assets('site')}}/images/relationship.png" alt="">
                        </div>
                        <span class="counterNum">1611</span>
                        <p class="counterText"> Total members</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counterBox">
                        <div class="counterImg">
                            <img src="{{assets('site')}}/images/video.png" alt="">
                        </div>
                        <span class="counterNum">1611</span>
                        <p class="counterText"> Total members</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counterBox">
                        <div class="counterImg genderImg" style="width:50px;">
                            <img src="{{assets('site')}}/images/gender.png" alt="">
                        </div>
                        <span class="counterNum">300</span>
                        <p class="counterText"> Women </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counterBox">
                        <div class="counterImg">
                            <img src="{{assets('site')}}/images/male (1).png" alt="">
                        </div>
                        <span class="counterNum">200</span>
                        <p class="counterText"> Men</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--Start Counters Section-->
    <!----------------------------------------->
    <!--Start Meeting Peaople Section-->
    <section class="meetPeople">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <h2>Meet New Prople</h2>
                    {!! $settings->translation()->meet_prople_content !!}

                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="meetImg">
                        <img src="{{$settings->meet_prople_image}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Meeting Peaople Section-->

    <!----------------------------------------->
    <!--Start How work  Section-->
    <section class="howWork">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="workBox">
                        <div class="workImg">
                            <img src="{{assets('site')}}/images/step1.png" alt="">
                            <div class="badge badge-info">1</div>
                        </div>
                        <div class="tellUs">Tell us who you are!</div>
                        <a href="#" class="joinLink"> Join Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="workBox">
                        <div class="workImg second_img">
                            <img src="{{assets('site')}}/images/step2.png" alt="">
                            <div class="badge badge-info">2</div>
                        </div>

                        <div class="tellUs">Tell us who you are!</div>
                        <a href="#" class="joinLink"> Join Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="workBox">
                        <div class="workImg">
                            <img src="{{assets('site')}}/images/step3.png" alt="">
                            <div class="badge badge-info">3</div>
                        </div>
                        <div class="tellUs">Tell us who you are!</div>
                        <a href="regestration.html" class="joinLink"> Join Now</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End How work  Section-->
    <!------------------------------------------------->
    <!--Start Features  Section-->
    <section class="Features">
        <div class="title text-center">
            <h4> Amazing Features
            </h4>
            {!! $settings->translation()->amazing_feature_content !!}

        </div>
        <div class="listContainer">
            <div class="freeCirecle">
                <div class="textBackground">
          <span>START NOW FOR
          </span>
                    <p>FREE
                    </p>
                    <span>S7 DAY TRIAL
          </span>

                </div>
            </div>
            <div class="rightFeature">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <ul class="featrureList">
                            <li>
                                <div class="featureIcon"><img src="{{assets('site')}}/images/star.png" alt=""></div>
                                <div class="featureContent">
                                    <h5>Amazing Features</h5>
                                    <p>Simple steps to follow to have a matching connection.</p>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="featureIcon"><img src="{{assets('site')}}/images/network.png" alt=""></div>
                                <div class="featureContent">
                                    <h5>Smart Matching</h5>
                                    <p>Simple steps to follow to have a matching connection.</p>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="featureIcon"><img src="{{assets('site')}}/images/filter.png" alt=""></div>
                                <div class="featureContent">
                                    <h5>Filter very fast</h5>
                                    <p>Simple steps to follow to have a matching connection.</p>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="featureIcon"><img src="{{assets('site')}}/images/like.png" alt=""></div>
                                <div class="featureContent">
                                    <h5>Cool community
                                    </h5>
                                    <p>Simple steps to follow to have a matching connection.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End Features  Section-->
    <!------------------------------------------------->
    <!--Start Success Story Section-->
    <section class="SuccessStories">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h4> Success Stories
                        </h4>
                        {!! $settings->translation()->stories_content !!}

                    </div>
                    <div class="successSlider owl-carousel">
                        <div class="successSliderItem">
                            <div class="sliderImgContainer">
                                <img src="{{assets('site')}}/images/slider1.png" alt="">
                            </div>
                            <div class="sliderContent">
                                <h4>Love horoscope for
                                    Cancer There will be...</h4>
                                <p>December 10, 2020</p>
                            </div>
                            <div class="sliderTail">
                                <a href="#"> Read More <i class="fa fa-arrow-right float-right"></i></a>
                            </div>
                        </div>
                        <div class="successSliderItem">
                            <div class="sliderImgContainer">
                                <img src="{{assets('site')}}/images/slider2.png" alt="">
                            </div>
                            <div class="sliderContent">
                                <h4>Love horoscope for
                                    Cancer There will be...</h4>
                                <p>December 10, 2020</p>
                            </div>
                            <div class="sliderTail">
                                <a href="#"> Read More <i class="fa fa-arrow-right float-right"></i></a>
                            </div>
                        </div>
                        <div class="successSliderItem">
                            <div class="sliderImgContainer">
                                <img src="{{assets('site')}}/images/slider3.png" alt="">
                            </div>
                            <div class="sliderContent">
                                <h4>Love horoscope for
                                    Cancer There will be...</h4>
                                <p>December 10, 2020</p>
                            </div>
                            <div class="sliderTail">
                                <a href="#"> Read More <i class="fa fa-arrow-right float-right"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!--End Success Story Section-->
    <!------------------------------------------------->
    <!--Start MemberShip Section-->
    <section class="Membership">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="MemberShipTitle">
                        <h4>Premium Membership</h4>
                        {!! $settings->translation()->membership_content !!}

                    </div>
                    <div class="joinUsBtns">
                        <a href="#" class="btn MembershipBtn">View Options</a>
                        <a href="#" class="btn MembershipBtn">Free 7 Days !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End MemberShip Section-->
    <!------------------------------------------------->
    <!--Start Member Section-->
    <section class="members">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="title text-center">
                        <h4> Latest Registered<br>
                            Members
                        </h4>
                        {!! $settings->translation()->register_member_content !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="sliderContainer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="membersSlider owl-carousel">
                            <div class="membersItem">
                                <div class="memberImg">
                                    <img src="{{assets('site')}}/images/mem1.png" alt="">
                                </div>
                                <div class="memberDesc">
                                    <h3>Kamal Basem</h3>
                                    <p>27 Old</p>
                                </div>

                            </div>
                            <div class="membersItem">
                                <div class="memberImg">
                                    <img src="{{assets('site')}}/images/mem2.png" alt="">
                                </div>
                                <div class="memberDesc">
                                    <h3>Hiba Ismail</h3>
                                    <p>27 Old</p>
                                </div>

                            </div>
                            <div class="membersItem">
                                <div class="memberImg">
                                    <img src="{{assets('site')}}/images/mem3.png" alt="">
                                </div>
                                <div class="memberDesc">
                                    <h3>Najwa Ismail</h3>
                                    <p>27 Old</p>
                                </div>

                            </div>
                            <div class="membersItem">
                                <div class="memberImg">
                                    <img src="{{assets('site')}}/images/mem4.png" alt="">
                                </div>
                                <div class="memberDesc">
                                    <h3>Jamal Ismail</h3>
                                    <p>27 Old</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Member Section-->

@endsection
@section('js')
    <script defer="defer">
        $("#slider").slider({
            range: true,
            min: 0,
            max: 70,
            step: 1,
            values: [22, 33],
            slide: function (event, ui) {
                var delay = function () {
                    var handleIndex = $(ui.handle).index();
                    var label = handleIndex == 1 ? '#min' : '#max';

                    $(label).html(ui.value).position({
                        my: 'center bottom',
                        at: 'center top',
                        of: ui.handle,
                        offset: "0, 10"
                    });
                };

                // wait for the ui.handle to set its position
                setTimeout(delay, 5);
            }
        });

        $('#min').html($('#slider').slider('values', 0)).position({
            my: 'center bottom',
            at: 'center top',
            of: $('#slider span:eq(0)'),
            offset: "0, 10"
        });

        $('#max').html($('#slider').slider('values', 1)).position({
            my: 'center bottom',
            at: 'center top',
            of: $('#slider span:eq(1)'),
            offset: "0, 10"
        });

    </script>
@endsection
