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
                        <h4> Chat Requests</h4>
                    </div>
                    <div class="quickSearch SortBy searchBox">
                        <form action="" class=" text-center">
                            <div class="form-group clearfix">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control search-form-contol" placeholder="Search By Name">
                            </div>
                        </form>
                    </div>
                    <div class="chatRequestBox clearfix">
                        <div class="chatRequestBoxImg">
                            <img src="{{assets('site')}}/images/s1.png" alt="">
                        </div>
                        <div class="chatRequestBoxDetails">
                            <h3>Sara Albetar</h3>
                            <span>28 Years Old.</span>
                            <span>UK</span>
                            <a href="#" class="Message">
                                Hello Ibrahim, can I speak to you, I would like know if you are interested or any
                            </a>
                        </div>
                    </div>
                    <div class="chatRequestBox clearfix">
                        <div class="chatRequestBoxImg">
                            <img src="{{assets('site')}}/images/s2.png" alt="">
                        </div>
                        <div class="chatRequestBoxDetails">
                            <h3>Maram Al Jamal</h3>
                            <span>28 Years Old.</span>
                            <span>UK</span>
                            <a href="#" class="Message">
                                Hello Ibrahim, can I speak to you, I would like know if you are interested or any
                            </a>
                        </div>
                    </div>
                    <div class="chatRequestBox clearfix">
                        <div class="chatRequestBoxImg">
                            <img src="{{assets('site')}}/images/s3.png" alt="">
                        </div>
                        <div class="chatRequestBoxDetails">
                            <h3>Nadia Sobhi</h3>
                            <span>28 Years Old.</span>
                            <span>UK</span>
                            <a href="#" class="Message">
                                Hello Ibrahim, can I speak to you, I would like know if you are interested or any
                            </a>
                        </div>
                    </div>
                    <div class="chatRequestBox clearfix">
                        <div class="chatRequestBoxImg">
                            <img src="{{assets('site')}}/images/like1.png" alt="">
                        </div>
                        <div class="chatRequestBoxDetails">
                            <h3>Gamila tarbolsi</h3>
                            <span>28 Years Old.</span>
                            <span>UK</span>
                            <a href="#" class="Message">
                                Hello Ibrahim, can I speak to you, I would like know if you are interested or any
                            </a>
                        </div>
                    </div>
                    <div class="chatRequestBox clearfix">
                        <div class="chatRequestBoxImg">
                            <img src="{{assets('site')}}/images/like2.png" alt="">
                        </div>
                        <div class="chatRequestBoxDetails">
                            <h3>Awsaf Jaber</h3>
                            <span>28 Years Old.</span>
                            <span>UK</span>
                            <a href="#" class="Message">
                                Hello Ibrahim, can I speak to you, I would like know if you are interested or any
                            </a>
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
