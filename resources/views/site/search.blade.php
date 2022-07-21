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

    <section class="Suggestions">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 order-lg-1 order-md-2 order-2">
                    <div class="quickSearch SortBy searchBox">
                        <form action="" class=" text-center">
                            <div class="form-group clearfix">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control search-form-contol" placeholder="Search By Name">
                            </div>
                        </form>
                    </div>
                    <div class="DiscoverHeader clearfix">
                        <h4> Search Suggestions</h4>
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
                <div class="col-lg-5 col-md-8 order-lg-2 order-md-1 order-1">
                    <div class="quickSearch SortBy">
                        <h3>Sort By</h3>
                        <form action="" class="heroForm text-center">
                            <div class="form-group clearfix">
                                <select name="" id="" class="select">
                                    <option value="" selected>Maches</option>
                                    <option value="">option2</option>
                                    <option value="">option2</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="quickSearch SortBy">
                        <h3>Advance Filter</h3>
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
                                            </label></div>
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
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> Looking For </label>
                                        <select name="" id="" class="select">
                                            <option value="" selected>Marrige</option>
                                            <option value="">Option1</option>
                                            <option value="">Option1</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> Religion </label>
                                        <select name="" id="" class="select">
                                            <option value="" selected>Muslim</option>
                                            <option value="">Option1</option>
                                            <option value="">Option1</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="formlist">
                                    <div class="form-group clearfix">
                                        <label class="form-group-title" for=""> Habbies </label>
                                        <select name="" id="" class="select">
                                            <option value="" selected>Act</option>
                                            <option value="">Option1</option>
                                            <option value="">Option1</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>

                            <button type="submit" class="btn joinBtn">Search</button>
                        </form>

                    </div>
                    <div class="quickSearch GetMembershipBox">
                        <div class="background"><img src="{{assets('site')}}/images/mask.png" alt=""></div>
                        <h3>Get Membership</h3>
                        <p>For More Features</p>
                        <a href="#" class="btn gotMember btn">Got It</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade show" id="userProfile" tabindex="-1" aria-labelledby="userProfile Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="profileBox">
                    <div class="profilePic">
                        <div class=" options"><a href="#"><i class="fas fa-ellipsis-v"></i></a></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <img src="{{assets('site')}}/images/userProfile.png" alt="">
                    </div>
                    <div class="profileDetails">
                        <div class="userDesc">
                            <div class="personalPic">
                                <img src="{{assets('site')}}/images/s1.png" alt="">
                            </div>
                            <h5> Ibrahim Jalal</h5>
                            <span>28 Years Old.UK</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="quickSearch profilesec">
                                    <h3>Resume (BIO)</h3>
                                    <p>Sed nisi nihil recusandae quis et et aliquam. Aliquid molestiae quos delectus
                                        deleniti enim. Ea quia laborum mollitia sunt autem. Distinctio molestiae nam
                                        aperiam et.</p>
                                </div>
                                <div class="DiscoverHeader GalleryImages clearfix">
                                    <h4>Gallery</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/s1.png" alt="">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/s2.png" alt="">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/s3.png" alt="">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/like1.png" alt="">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/like2.png" alt="">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="personImg galleryImg">
                                            <a href="#">
                                                <img src="{{assets('site')}}/images/s1.png" alt="">

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="quickSearch profilesec">
                                    <h3>Information</h3>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Age</p>
                                        <p class="rightSec float-right"> 28</p>
                                    </div>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Gender</p>
                                        <p class="rightSec float-right"> Female</p>
                                    </div>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Country</p>
                                        <p class="rightSec float-right"> Palestine</p>
                                    </div>
                                </div>
                                <div class="quickSearch profilesec">
                                    <h3>Determination</h3>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Religion</p>
                                        <p class="rightSec float-right"> Muslim</p>
                                    </div>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Education</p>
                                        <p class="rightSec float-right"> Graduated form university</p>
                                    </div>
                                    <div class="infoSec clearfix">
                                        <p class="leftSec float-left">Hobbies</p>
                                        <p class="rightSec float-right"> Acting</p>
                                    </div>
                                </div>
                                <div class="quickSearch profilesec">
                                    <h3>Looking For</h3>
                                    <p>Marrige</p>
                                </div>
                            </div>
                            <div class="LikeSection">
                                <a href="#" class="btn likeBtn"><i class="fas fa-heart"></i> </a>
                                <a href="#" class="btn likeBtn blueBG"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script defer="defer">
            $('#userProfile').modal("show")

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
