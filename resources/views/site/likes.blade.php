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
                <div class="col-md-12">
                    <div class="DiscoverHeader clearfix">
                        <h4> Search Suggestions</h4>
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
                    <div class="personImg"><a href="#">
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
                    <div class="personImg"><a href="#">
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
                            <img src="{{assets('site')}}/images/like1.png" alt="">
                            <div class="personDesc">
                                <h3>Sara Albetar</h3>
                                <p>28 Years Old</p>
                                <p>UK</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="personImg"><a href="#">
                            <img src="{{assets('site')}}/images/like2.png" alt="">
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
                            <img src="{{assets('site')}}/images/like1.png" alt="">
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
                    <div class="personImg"><a href="#">
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
                            <img src="{{assets('site')}}/images/like1.png" alt="">
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
                    <div class="personImg"><a href="#">
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
                            <img src="{{assets('site')}}/images/like1.png" alt="">
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
                    <div class="personImg"><a href="#">
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
