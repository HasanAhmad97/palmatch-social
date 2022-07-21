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
    <section class="editprofilePage">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="nav  editProfileList flex-column nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link active" id="Profile_Photo-tab" data-toggle="pill" href="#Profile_Photo"
                           role="tab" aria-controls="Profile_Photo" aria-selected="true"><i class="fas fa-camera"></i>
                            Profile Photo <span class="fas fa-chevron-right float-right"></span> </a>
                        <a class="nav-link" id="cover-photo-tab" data-toggle="pill" href="#cover-photo" role="tab"
                           aria-controls="cover-photo" aria-selected="false"><i class="fas fa-image"></i> Cover Photo
                            <span class="fas fa-chevron-right float-right"></span></a>
                        <a class="nav-link" id="General-Information-tab" data-toggle="pill" href="#General-Information"
                           role="tab" aria-controls="General-Information" aria-selected="false"><i
                                class="fas fa-user"></i> General Information's <span
                                class="fas fa-chevron-right float-right"></span></a>
                        <a class="nav-link" id="Determinants-tab" data-toggle="pill" href="#Determinants" role="tab"
                           aria-controls="Determinants" aria-selected="false"><i class="fas fa-image"></i>Determinants
                            <span class="fas fa-chevron-right float-right"></span></a>
                        <a class="nav-link" id="BIO-tab" data-toggle="pill" href="#BIO"
                           role="tab" aria-controls="BIO" aria-selected="false"><i
                                class="fas fa-exclamation-circle"></i>Resume (BIO) <span
                                class="fas fa-chevron-right float-right"></span></a>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="Profile_Photo" role="tabpanel"
                             aria-labelledby="Profile_Photo-tab">
                            <div class="userDesc">
                                <div class="personalPic">
                                    <img src="{{user()->photo}}" alt="">
                                </div>
                                <form action="">
                                    <label class="btn changeProfileImg" for="changeImg"><i class="fas fa-camera"></i>
                                        Change</label>
                                    <input type="file" id="changeImg">
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="cover-photo" role="tabpanel" aria-labelledby="cover-photo-tab">
                            <div class="userDesc">
                                <form action="">
                                    <label class="changeCoverPhoto" for="changeCover"><img src="{{user()->cover}}"
                                                                                           alt=""></label>
                                    <input type="file" id="changeCover">
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="General-Information" role="tabpanel"
                             aria-labelledby="General-Information-tab">
                            <div class="quickSearch">
                                <form action="" class="heroForm text-center userProfileInfo">
                                    <ul class="text-left">
                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> Age </label>
                                                <input type="text" class="form-control" placeholder="Age..."
                                                       value="{{user()->age}}">
                                            </div>
                                        </li>
                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> Gender </label>
                                                <select name="" id="" class="select">
                                                    <option value="male" @if(user()->gender == 'male') selected @endif>
                                                        Male
                                                    </option>
                                                    <option value="female"
                                                            @if(user()->gender == 'female') selected @endif>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> country </label>
                                                <select name="" id="" class="select">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}"
                                                                @if(user()->country_id == $country->id) selected @endif>{{$country->translation()->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="Determinants" role="tabpanel" aria-labelledby="Determinants-tab">
                            <div class="quickSearch">
                                <form action="" class="heroForm text-center userProfileInfo">
                                    <ul class="text-left">

                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> Religion </label>
                                                <select name="" id="" class="select">
                                                    @foreach($religions as $religion)
                                                        <option value="{{$country->id}}"
                                                                @if(user()->religion_id == $religion->id) selected @endif>{{$religion->translation()->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> Education </label>
                                                <input type="text" class="form-control"
                                                       placeholder="Graduated form university">
                                            </div>
                                        </li>
                                        <li class="formlist">
                                            <div class="form-group clearfix">
                                                <label class="form-group-title" for=""> Looking For </label>
                                                <select name="" id="" class="select">
                                                    <option value="" selected>Marrige</option>
                                                    <option value="">freind</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="formlist">
                                            <div class="form-group checkboxFormGroup">
                                                <label for="" class="checkboxTitle"> Hobbies (Checkbox)</label>
                                                <div class="checkboxContainer">
                                                    <label class="checkboxCont" for="Acting">
                                                        <input type="checkbox" id="Acting">
                                                        <span class="checkboxStyle">Acting</span>
                                                    </label>
                                                    <label class="checkboxCont" for="Baking">
                                                        <input type="checkbox" id="Baking">
                                                        <span class="checkboxStyle">Baking</span>
                                                    </label>
                                                    <label class="checkboxCont" for="Blogging">
                                                        <input type="checkbox" id="Blogging">
                                                        <span class="checkboxStyle">Blogging</span>
                                                    </label>
                                                    <label class="checkboxCont" for="Bowling">
                                                        <input type="checkbox" id="Bowling">
                                                        <span class="checkboxStyle">Bowling</span>
                                                    </label>
                                                    <label class="checkboxCont" for="Coffeeroasting">
                                                        <input type="checkbox" id="Coffeeroasting">
                                                        <span class="checkboxStyle">Coffee roasting</span>
                                                    </label>
                                                    <label class="checkboxCont" for="Filmmaking">
                                                        <input type="checkbox" id="Filmmaking">
                                                        <span class="checkboxStyle">Filmmaking</span>
                                                    </label>
                                                    <a href="#" class="btn SignIn More">More</a>


                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="BIO" role="tabpanel" aria-labelledby="BIO-tab">
                            <div class="quickSearch profilesec editProfileBio">
                                <h3>Resume (BIO)</h3>
                                <form>  <textarea name="" id="">Sed nisi nihil recusandae quis et et aliquam. Aliquid molestiae quos delectus
                                deleniti enim. Ea quia laborum mollitia sunt autem. Distinctio molestiae nam
                                aperiam et</textarea></form>
                            </div>
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

        function readURL(input) {
            var $input = input;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $($input).next()
                        .attr('src', e.target.result)
                        .css("display", "block");
                    $($input).next().next().css("display", "none");

                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
