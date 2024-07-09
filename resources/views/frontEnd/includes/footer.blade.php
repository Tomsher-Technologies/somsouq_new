@php
$category = CommonFunction::getCategory();
@endphp

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Find amazing deals on the go. <br>
                        <span>Download the app now!</span></h4>
                </div>
                <div class="col-md-5">
                    <span><img src="{{ asset('assets/frontEnd/images/play.png') }}" alt=""></span>
                    <span><img src="{{ asset('assets/frontEnd/images/app.png') }}" alt=""></span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="{{ asset('assets/frontEnd/images/logo.png') }}" width="120" class="rounded-2" alt="">
                </div>

                <div class="col-md-10 text-md-end">
                    <a href="{{ route('post.create') }}" class="btn btn-primary" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>Post Free Ad</a>
                </div>
            </div>
            <hr class="footer-hr">
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-links">
                        <h5>Our Categories</h5>
                        <ul>
                            @for($i = 0; $i<=3; $i++)
                                <li>
                                    <a href="{{ route('post.detail-category', ['cat_id' => $category[$i]->id]) }}">{{ $category[$i]->en_name }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 align-content-md-end">
                    <div class="footer-links">
                        <ul>
                            <li>
                                <a href="#">Fashion</a>
                            </li>
                            <li>
                                <a href="#">Electronics</a>
                            </li>
                            <li>
                                <a href="#">Health & Beauty</a>
                            </li>
                            <li>
                                <a href="#">Furniture & Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 align-content-md-end">
                    <div class="footer-links">
                        <ul>
                            <li>
                                <a href="#">Mobile & Tablet</a>
                            </li>
                            <li>
                                <a href="#">Jobs</a>
                            </li>
                            <li>
                                <a href="#">Sports & School Product</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul>
                            <li>
                                <a href="{{ route('about-us') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('term-condition') }}">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-links">
                        <h5>Support</h5>
                        <ul>
                            <li>
                                <a href="{{ route('help') }}">Help</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('tutorial') }}">Tutorial</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="social-links">
                        <h5>FOLLOW US</h5>
                        <ul>
                            <li>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="footer-hr">

            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>Designed by som souq . © 2024 . All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="footer-terms-policy">
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="#">Privacy Policy</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">Terms & Conditions</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
