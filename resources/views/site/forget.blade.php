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
    <section class="profileDetails passwordpage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 ">
                    <form action="" class="modalForm quickSearch passwordForm">
                        <div class="lockImg">
                            <img src="{{assets('site')}}/images/lock.png" alt="">
                        </div>
                        <h6>Forget Your Password</h6>
                        <span>Enter the email associated with your account</span>
                        <div class="form-group">
                            <input type="Email" class="form-control" placeholder="Enter Your Email">
                        </div>

                        <button class="btn joinBtn save" type="submit">Save</button>

                    </form>
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
