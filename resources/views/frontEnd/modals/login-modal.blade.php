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
                        <a href="{{ url('auth/facebook') }}" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/facebook.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Facebook</a>
                        <a href="{{ url('auth/google') }}" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/google.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Google</a>
{{--                        <a href="#" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/apple.png') }}" class="img-fluid"--}}
{{--                                                                     alt=""> Continue with Apple</a>--}}
                        <a href="#" class="btn btn-login" data-bs-target="#signInModal"
                           data-bs-toggle="modal"> <img src="{{ asset('assets/frontEnd/images/email.png') }}" class="img-fluid" alt="">
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
                        <form action="{{ route('user.registration') }}" method="post" id="registrationForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                                <span class="text-danger" id="usernameError"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                                <span class="text-danger" id="passwordErrorReg"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password">
                                <span class="text-danger" id="password_confirmation_error"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">State</label>
                                <select class="form-control" name="state_id" onChange="getCityByStateId(this.value, 'city_id')">
                                    <option value="">-Select-</option>
                                    @foreach($states as $key => $state)
                                        <option value="{{ $key }}">{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">City</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="">-Select-</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-center py-4">
                                <a href="#"><i class="bi bi-geo-alt-fill"></i> User my current location</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email <small>( Optional )</small></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email address">
                                <span class="text-danger" id="emailErrorReg"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Phone Number <small>( Optional )</small></label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone number">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Which City You Was Born</label>
                                <input type="text" class="form-control" name="place_of_birth" placeholder="Enter City">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Year Of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder="Enter DOB">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-login mb-2"> Sign Up </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade login-modal" id="signInModal" tabindex="-1" aria-labelledby="signINModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11 m-auto">
                        <h3 class="my-4">Log in with your email</h3>
                        <form action="{{ route('user.login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email/ Username</label>
                                    <input type="text" class="form-control" name="input_type" placeholder="Enter email or username">
                                    <span class="text-danger" id="emailError"></span>
                                    <span class="text-danger" id="usernameErrorLogin"></span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                                    <span class="text-danger" id="passwordError"></span>

                                    <span class="text-danger" id="isLoginError"></span>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-login mb-2"> Log In </button>
                                </div>
                            </div>
                        </form>
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




