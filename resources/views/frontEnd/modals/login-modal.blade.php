<!-- Modal -->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <img src="{{ asset('assets/frontEnd/images/login-img.jpg') }}" class="img-fluid" alt="">
                        <h3 class="my-4">{{ __('user.login') }}</h3>
                        <a href="{{ url('auth/facebook') }}" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/facebook.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Facebook</a>
                        <a href="{{ url('auth/google') }}" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/google.png') }}" class="img-fluid"
                                                                     alt=""> Continue with Google</a>
{{--                        <a href="#" class="btn btn-login mb-2"> <img src="{{ asset('assets/frontEnd/images/apple.png') }}" class="img-fluid"--}}
{{--                                                                     alt=""> Continue with Apple</a>--}}
                        <a href="#" class="btn btn-login" data-bs-target="#signInModal"
                           data-bs-toggle="modal"> <img src="{{ asset('assets/frontEnd/images/email.png') }}" class="img-fluid" alt="">
                            Continue with Email/ Username
                        </a>
                        <p class="py-3 text-center">{{ __('user.do_not_have_account') }} <a href="#" data-bs-target="#signUpModal"
                                                                              data-bs-toggle="modal">{{ __('user.create') }}</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade login-modal" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <a href="#" class="text-black" data-bs-target="#loginModal" data-bs-toggle="modal"><i class="bi bi-arrow-left me-2"></i>{{ __('user.back') }}</a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11 m-auto">
                        <h3 class="my-4">{{ __('user.create_an_account') }}</h3>
                        <form action="{{ route('user.registration') }}" method="post" id="registrationForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.username') }}</label>
                                <input type="text" name="username" class="form-control" placeholder="{{ __('user.enter_username') }}">
                                <span class="text-danger" id="usernameError"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.password') }}</label>
                                <input type="password" class="form-control" name="password" placeholder="{{ __('user.enter_password') }}">
                                <span class="text-danger" id="passwordErrorReg"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.confirm_password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('user.enter_password') }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('post.state') }}</label>
                                <select class="form-control" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}')">
                                    <option value="">-{{ __('post.select') }}-</option>
                                    @foreach(CommonFunction::getState() as $state)
                                        <option value="{{ $state->id }}">{{ $state->getTranslation('name', getLocaleLang()) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('post.city') }}</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="">-{{ __('post.select') }}-</option>
                                </select>
                            </div>
{{--                            <div class="col-md-12 text-center py-4">--}}
{{--                                <a href="#"><i class="bi bi-geo-alt-fill"></i> User my current location</a>--}}
{{--                            </div>--}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.email') }} <small>( {{ __('user.optional') }} )</small></label>
                                <input type="email" class="form-control" name="email" placeholder="{{ __('user.enter_email_address') }}">
                                <span class="text-danger" id="emailErrorReg"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.phone_number') }}</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="{{ __('user.enter_phone_number') }}">
                                <span class="text-danger" id="phoneError"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.place_of_birth') }}</label>
                                <input type="text" class="form-control" name="place_of_birth" placeholder="{{ __('user.enter_city') }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('user.year_of_birth') }}</label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder="{{ __('user.enter_dob') }}">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-login mb-2"> {{ __('user.sign_up') }} </button>
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
        <div class="modal-content">
            <div class="modal-header border-0">
                <a href="#" class="text-black" data-bs-target="#loginModal" data-bs-toggle="modal"><i class="bi bi-arrow-left me-2"></i>{{ __('user.back') }}</a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <h3 class="my-4">{{ __('user.login_with_email_username') }}</h3>
                        <form action="{{ route('user.login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">{{ __('user.email_username') }}</label>
                                    <input type="text" class="form-control" name="input_type" placeholder="{{ __('user.enter_email_username') }}">
                                    <span class="text-danger" id="emailError"></span>
                                    <span class="text-danger" id="usernameErrorLogin"></span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">{{ __('user.password') }}</label>
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('user.enter_password') }}">
                                    <span class="text-danger" id="passwordError"></span>

                                    <span class="text-danger" id="isLoginError"></span>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-login mb-2"> {{ __('user.log_in') }} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>






