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
    <!--Start Suggestions Section-->
    <section class="Suggestions">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 order-lg-1 order-md-2 order-2">
                    <div class="DiscoverHeader clearfix">
                        <h4>Suggestions</h4>
                        <a href="#">View More</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8 order-lg-2 order-md-1 order-1">
                    <div class="quickSearch">
                        <h3>Quick Search</h3>
                        <form action="" class="heroForm text-center">
                            <ul class="text-left">
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> seeking a </label>
                                        <div class="Rightside float-right">
                                            <label class="radioButtonContainer">Man
                                                <input type="radio" class="radioButton">
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="radioButtonContainer">Women
                                                <input type="radio" class="radioButton">
                                                <span class="checkmark"></span>
                                            </label> </div>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> Age </label>
                                        <div class="Rightside sliderCont float-right">
                                            <div id="min"></div>
                                            <div id="max"></div>
                                            <div id="slider"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> country </label>
                                        <select name="" id="" class="select">
                                            <option value="" selected>palestine</option>
                                            <option value="">jordan</option>
                                            <option value="">germany</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>

                            <button type="submit" class="btn joinBtn">Search</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Like">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <h4>You May Like</h4>
                        <a href="#">View More</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/like1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/like2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sameHabbies">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <span>Acting, Bowling </span>
                        <h4>Same Habbies</h4>
                        <a href="#">View More</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="toKnow">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <h4>Get to know</h4>
                    </div>
                    <div class="personCard clearfix">
                        <div class="personImg">
                            <a href="#">
                                <img src="{{assets('site')}}/images/s1.png" alt="">
                                <div class="personDesc">
                                    <h3>Sara Albetar</h3>
                                    <p>28 Years Old</p>
                                    <p>UK</p>
                                </div>
                            </a>
                        </div>
                        <div class="personDetails clearfix">
                            <table>
                                <tr>
                                    <td><span>Religion</span>
                                        <p>Muslim</p>
                                    </td>
                                    <td><span>Hobbies</span>
                                        <p>Acting</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Country</span>
                                        <p>Lebanon</p>
                                    </td>
                                    <td><span>Looking for</span>
                                        <p>Marrige</p>
                                    </td>
                                </tr>
                            </table>
                            <div class="LikeSection float-right">
                                <a href="#" class="btn likeBtn"><i class="fas fa-heart"></i> </a>
                                <a href="#" class="btn likeBtn blueBG"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="toKnow">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <h4>Recently Joined</h4>
                        <a href="#">View More</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s1.png" alt="">
                                    <div class="personDesc">
                                        <h3>Sara Albetar</h3>
                                        <p>28 Years Old</p>
                                        <p>UK</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg">
                                <a href="#">
                                    <img src="{{assets('site')}}/images/s2.png" alt="">
                                    <div class="personDesc">
                                        <h3>Laila Sameer</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="personImg"> <a href="#">
                                    <img src="{{assets('site')}}/images/s3.png" alt="">
                                    <div class="personDesc">
                                        <h3>Salwa Jameel</h3>
                                        <p>25 Years Old</p>
                                        <p> United Emirates</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="toKnow">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <h4>Suitable For You</h4>
                    </div>
                    <div class="personCard clearfix">
                        <div class="personImg">
                            <a href="#">
                                <img src="{{assets('site')}}/images/like2.png" alt="">
                                <div class="personDesc">
                                    <h3>Sara Albetar</h3>
                                    <p>28 Years Old</p>
                                    <p>UK</p>
                                </div>
                            </a>
                        </div>
                        <div class="personDetails clearfix">
                            <table>
                                <tr>
                                    <td><span>Religion</span>
                                        <p>Muslim</p>
                                    </td>
                                    <td><span>Hobbies</span>
                                        <p>Acting</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Country</span>
                                        <p>Lebanon</p>
                                    </td>
                                    <td><span>Looking for</span>
                                        <p>Marrige</p>
                                    </td>
                                </tr>
                            </table>
                            <div class="LikeSection float-right">
                                <a href="#" class="btn likeBtn"><i class="fas fa-heart"></i> </a>
                                <a href="#" class="btn likeBtn blueBG"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
