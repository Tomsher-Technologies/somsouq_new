<!-- Modal -->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <img src="{{ asset('assets/frontEnd/images/login-img.jpg') }}" class="img-fluid" alt="">
                        <h3 class="my-4">Login</h3>
                        <a href="#" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/facebook.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Facebook</a>
                        <a href="#" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/google.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Google</a>
                        <a href="#" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/apple.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Apple</a>
                        <a href="#" class="btn btn-login"> <img src="{{ asset('assets/frontEnd/images/email.png') }}" class="img-fluid" alt="">
                            Continue with Email</a>
                        <p class="py-3 text-center">Don’t have an account? <a href="#" data-bs-target="#signUpModal"
                                                                              data-bs-toggle="modal">Create</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade login-modal" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11 m-auto">
                        <h3 class="my-4">Create an account</h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Enter username">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" placeholder="State, Region">
                            </div>
                            <div class="col-md-12 text-center py-4">
                                <a href="#"><i class="bi bi-geo-alt-fill"></i> User my current location</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email <small>( Optional )</small></label>
                                <input type="text" class="form-control" placeholder="Enter email address">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Phone Number <small>( Optional )</small></label>
                                <input type="text" class="form-control" placeholder="State, Region">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Which City You Was Born</label>
                                <input type="text" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Year Of Birth</label>
                                <input type="text" class="form-control" placeholder="Enter DOB">
                            </div>
                            <div class="col-md-12">
                                <a href="#" class="btn btn-login mb-2"> Sign Up </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="mobile-nav">

    <a href="#" class="add-post"><i class="bi bi-plus"></i></a>
    <ul>
        <li>
            <a href="#">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-search"></i>
                <span>Search</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="account.html">
                <i class="bi bi-person"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
