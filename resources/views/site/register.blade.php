<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pal Match </title>
    <link href="{{assets('site')}}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="{{assets('site')}}/css/lightbox.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="{{assets('site')}}/images/logo.png">
    <link href="{{assets('site')}}/css/selectric.css" rel="stylesheet">
    <link rel="stylesheet" href="{{assets('site')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{assets('site')}}/css/owl.carousel.css" type="text/css">
    <link href="{{assets('site')}}/css/prettify.css" rel="stylesheet">
    <link href="{{assets('site')}}/css/style.css" rel="stylesheet">

</head>
<div class="RegestrationContainer">
    <!--Start Header-->
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg order-md-1">

                    <div class="col-lg-2 col-md-4">
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{assets('site')}}/images/logo.png"
                                                                         alt=""></a>
                    </div>
                    <div class="col-lg-4 col-md-6 ">


                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="signInSection float-right">
                            <span>You have Account?</span> <a data-toggle="modal" data-target="#loginModal"
                                                              class="loginLink">Login Please</a>
                            <a href="#" class="skip btn">Skip</a>

                        </div>
                    </div>

                </nav>

            </div>
        </div>

    </header>
    <!--End Header-->
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab"></a></li>
                        <li><a href="#tab2" data-toggle="tab"></a></li>
                        <li><a href="#tab3" data-toggle="tab"></a></li>
                        <li><a href="#tab4" data-toggle="tab"></a></li>
                        <li><a href="#tab5" data-toggle="tab"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="bar" class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 style="width: 0%;"></div>
        </div>
        <div class="stepsWelcom text-center">
            <h5>welcome</h5>
            <p>With just a f             ds;fsd'f;lds;l'f;lds;lfs'dl'fs;dl'; ds;fsd'f;lds;l'f;lds;lfs'dl'fs;dl';
ew clicks you will be ready to start your love adventure</p>
        </div>
       

        {{--        SELECT `id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `country_id`, `education`, `religion_id`, `interest_id`, `phone`, `photo`, `cover`, `is_active`, `is_online`, `is_complete`, `dob`, `bio`, `deleted_at`, `remember_token`, `created_at`, `updated_at` FROM `users` WHERE 1--}}
        {!! Form::open(['method'=>'PUT','url'=>url('complete-profile'),'class'=>'stepsForm','files'=>true]) !!}
        <div class="tab-content">
            <div class="tab-pane" id="tab1">

                <div class="form-group">
                    <label for=""> Birth Date</label>
                    <input type="date" class="form-control" placeholder="20" name="dob">
                </div>
                <div class="form-group">
                    <label for=""> Gender</label>
                    <select name="gender" class="select">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Religion (Drop-down List)</label>
                    <select name="religion_id" id="religion_id" class="select">
                        <option value="" selected>Select</option>
                        @foreach($religions as $religion)
                            <option
                                value="{{$religion->id}}">{{$religion->translation()->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Phone Number</label>
                    <input type="text" class="form-control" placeholder="00970123456" name="phone">
                </div>

            </div>
            <div class="tab-pane" id="tab2">
                <div class="form-group">
                    <label for=""> Education</label>
                    <input type="text" class="form-control" placeholder="Enter your education here" name="education">
                </div>
                <div class="form-group">
                    <label for=""> Country (Drop-down List)</label>
                    <select name="country_id" id="country_id" class="select">
                        <option value="" selected>Select</option>
                        @foreach($countries as $country)
                            <option
                                value="{{$country->id}}">{{$country->translation()->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group checkboxFormGroup">
                    <label for="" class="checkboxTitle"> Hobbies (Checkbox)</label>
                    <div class="checkboxContainer">
                        @foreach($hobbies as $hobby)
                            <label class="checkboxCont" for="hobby_id{{$hobby->id}}">
                                <input type="checkbox" id="hobby_id{{$hobby->id}}" name="hobby_id[]"
                                       value="{{$hobby->id}}">
                                <span class="checkboxStyle">{{$hobby->translation()->name}}</span>
                            </label>
                        @endforeach
                        <a href="#" class="btn SignIn More">More</a>


                    </div>

                </div>
            </div>
            <div class="tab-pane" id="tab3">
                <div class="form-group checkboxFormGroup">
                    <label for="" class="checkboxTitle">Looking For</label>
                    <div class="checkboxContainer">
                        @foreach($interests as $interest)
                            <label class="checkboxCont" for="interest{{$interest->id}}">
                                <input type="checkbox" id="interest{{$interest->id}}" name="interest_id[]"
                                       value="{{$interest->id}}">
                                <span class="checkboxStyle">{{$interest->translation()->name}}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Resume (BIO) </label>
                    <textarea class="form-control" name="bio" placeholder="Type here ( Maximum 100 letter)"></textarea>

                </div>

            </div>
            <div class="tab-pane" id="tab4">
                <div class="form-group uploadformGroup">
                    <label> Profile Photo </label>

                    <Label for="uploadPhoto" class="uploadImg">
                        <input type="file" id="uploadPhoto" name="photo" alt="" onchange="readURL(this);">
                        <img id="personalImg" src="#" alt="your image" style="display: none;"/>
                        <img src="{{assets('site')}}/images/uploadImg.png" id="defultPersonalImg">
                    </Label>


                </div>
                <div class="form-group uploadformGroup">
                    <label> Profile Cover </label>
                    <Label for="uploadPhotoCover" class="uploadCover">
                        <input type="file" id="uploadPhotoCover" name="cover" onchange="readURL(this);">
                        <img id="coverPhoto" src="#" alt="your image" style="display: none;"/>

                        <div class="innerImgCover">
                            <img class="defulatCoverImg" src="{{assets('site')}}/images/img.png" alt="">
                        </div>

                    </Label>
                </div>
                <button class="btn joinBtn  nextBtn" type="submit">Finish</button>

            </div>

        </div>
        <ul class="pager wizard">
            <li class="next"><a class="joinBtn btn nextBtn" href="#">Next</a></li>
        </ul>
        {!! Form::close() !!}

    </div>
</div>

<!--Start Body-->
<!------------------------------------------------->

<body>
<!-----Sign In Modal---->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="loginModalLabel">Login</h5>

            <div class="modal-body">
                <form action="" class="modalForm">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group passwordFormGroup">
                        <input type="password" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group ">
                        <input type="checkbox" id="Remember">
                        <label for="Remember" class="rememberPass">Remember Password</label>
                    </div>
                    <button class="btn joinBtn modalLoginBtn" type="submit">Login</button>
                    <a href="#" class="forgetPassword">Forget Password</a>
                    <div class="or">Or</div>
                    <a href="#" class="btn joinBtn modalLoginBtn facbookBtn"><i class="fab fa-facebook-f"></i>
                        facbook </a>
                    <a href="#" class="btn joinBtn modalLoginBtn googleplusBtn"><i class="fab fa-google-plus-g"></i>
                        Google</a>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Sign In Modal -->

<!----- End Sign Up Modal---->

<script type="text/javascript" src="{{assets('site')}}/js/jquery1.js"></script>
<script type="text/javascript" src="{{assets('site')}}/js/waypoints-min.js"></script>
<script type="text/javascript" src="{{assets('site')}}/js/countUp.js"></script>
<script type="text/javascript" src="{{assets('site')}}/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{assets('site')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{assets('site')}}/js/jquery.selectric.min.js"></script>
<script src="{{assets('site')}}/js/owl.carousel.js"></script>
<script src="{{assets('site')}}/js/jquery.bootstrap.wizard.js"></script>
<script src="{{assets('site')}}/js/prettify.js"></script>
<script type="text/javascript" src="{{assets('site')}}/js/main.js"></script>

<script>
        $('.select').selectric({
            disableOnMobile: false,
            nativeOnMobile: false,
            dir: "ltr"
        });
    </script>
<script>
        $(document).ready(function () {
            $('#rootwizard').bootstrapWizard({
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#rootwizard .progress-bar').css({width: $percent + '%'});
                }
            });
            window.prettyPrint && prettyPrint();
            if ($(".tab-content tab-pane#tab4").hasClass("active")) {
                $(".pager.wizard").hide();
            }
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
</body>

</html>
