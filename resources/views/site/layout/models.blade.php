<!-----Sign In Modal---->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="loginModalLabel">Login</h5>

            <div class="modal-body">
                {!! Form::open(['method'=>'post','url'=>route('user.login'),'class'=>'modalForm']) !!}
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email"  name="email">
                </div>
                <div class="form-group passwordFormGroup">
                    <input type="password" class="form-control" placeholder="password"  name="password">
                </div>
                <div class="form-group ">
                    <input type="checkbox" id="Remember"  name="rememberme">
                    <label for="Remember" class="rememberPass">Remember Password</label>
                </div>
                <button class="btn joinBtn modalLoginBtn" type="submit">Login</button>
                <a href="{{url('forget')}}" class="forgetPassword">Forget Password</a>
                <div class="or">Or</div>
                <a href="#" class="btn joinBtn modalLoginBtn facbookBtn"><i class="fab fa-facebook-f"></i>
                    facebook </a>
                <a href="#" class="btn joinBtn modalLoginBtn googleplusBtn"><i class="fab fa-google-plus-g"></i>
                    Google</a>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>

<!-- End Sign In Modal -->
<!------------------------------------------------->
<!-----Sign Up Modal---->

<div class="modal fade" id="SignupModel" tabindex="-1" aria-labelledby="SignupModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="SignupModelLabel">Sign Up</h5>

            <div class="modal-body">
                {{--                <form action="" class="modalForm">--}}
                {!! Form::open(['method'=>'post','url'=>route('user.create'),'class'=>'modalForm','id'=>'signupFrm']) !!}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="User Name" name="name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group ">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group passwordFormGroup">
                    <input type="password" class="form-control" placeholder="Confirm password"
                           name="password_confirmation">
                </div>
                <div class="form-group ">
                    <input type="checkbox" id="Remember" name="term">
                    <label for="Remember" class="rememberPass">Terms & Conditions</label>
                </div>
                <button class="btn joinBtn modalLoginBtn" type="submit">Next</button>
                {{--                </form>--}}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
<!----- End Sign Up Modal---->
<!------------------------------------------------->
<!-----Membership Modal---->
<div class="modal fade" id="Membership" tabindex="-1" aria-labelledby="MembershipLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="MembershipLabel">Get You Membership</h5>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="membershipBox">
                                <div class="background">
                                    <img src="{{assets('site')}}/images/memberbg.png" alt="">
                                </div>
                                <div class="headerMember">
                                    <h6>Premium</h6>
                                    <h5>1</h5>
                                    <span>Month</span>
                                    <span>100$</span>
                                </div>
                                <ul class="membershipList">
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                </ul>
                            </div>
                            <a href="#" class="btn joinBtn modalLoginBtn subscribeBtn"> Subscribe</a>

                        </div>
                        <div class="col-md-3">
                            <div class="membershipBox">
                                <div class="background">
                                    <img src="{{assets('site')}}/images/memberbg.png" alt="">
                                </div>
                                <div class="headerMember">
                                    <h6>Premium</h6>
                                    <h5>3</h5>
                                    <span>Month</span>
                                    <span>300$</span>
                                </div>
                                <ul class="membershipList">
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                </ul>
                            </div>
                            <a href="#" class="btn joinBtn modalLoginBtn subscribeBtn"> Subscribe</a>

                        </div>
                        <div class="col-md-3">
                            <div class="membershipBox">
                                <div class="background">
                                    <img src="{{assets('site')}}/images/memberbg.png" alt="">
                                </div>
                                <div class="headerMember">
                                    <h6>Premium</h6>
                                    <h5>6</h5>
                                    <span>Month</span>
                                    <span>500$</span>
                                </div>
                                <ul class="membershipList">
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                </ul>
                            </div>
                            <a href="#" class="btn joinBtn modalLoginBtn subscribeBtn"> Subscribe</a>

                        </div>
                        <div class="col-md-3">
                            <div class="membershipBox">
                                <div class="background">
                                    <img src="{{assets('site')}}/images/memberbg.png" alt="">
                                </div>
                                <div class="headerMember">
                                    <h6>Premium</h6>
                                    <h5>1</h5>
                                    <span>Year</span>
                                    <span>700$</span>
                                </div>
                                <ul class="membershipList">
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                    <li><i class="fas fa-chevron-right"></i>Quos quam laboriosam sed</li>
                                </ul>
                            </div>
                            <a href="#" class="btn joinBtn modalLoginBtn subscribeBtn"> Subscribe</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!----- End Sign Up Modal---->
