<footer class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="subscribe">
                    <h3>Sign up to recieve a monthly email on the latest news!</h3>
                    <form action="">
                        <input type="text" class="form-control footerFormControl"
                               placeholder="Enter your email address">
                        <a href="#" class="send"><i class="fas fa-paper-plane"></i></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row footerRow">
            <div class="col-lg-4 col-md-6 ">
                <div class="FooterLogo">
                    <img src="{{url('/')}}/assets/logo.png" alt="">
                </div>
                <h3 class="visitUs"> Visit Us On</h3>
                <ul class="footerSocial">

                    @foreach($social_links as $link)
                        <li>
                            <a href="{{$link->name}}" target="_blank"><i class="{{$link->icon}}"></i></a>
                        </li>
                    @endforeach

                </ul>

            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="footerTitle">
                    HELP CENTER
                </h4>
                <ul class="footerList">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQS</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="footerTitle">
                    CMS
                </h4>
                <ul class="footerList">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Terms and conditions
                        </a></li>
                    <li><a href="#">
                            Privacy policy
                        </a></li>
                    <li><a href="#">
                            Contact us
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyRight">
        Copyright © {{\Carbon\Carbon::now()->format('Y')}}.All Rights Reserved By {{env('APP_NAME')}}
    </div>
</footer>
