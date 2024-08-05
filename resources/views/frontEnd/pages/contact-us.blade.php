@extends('frontEnd.layouts.layout')
@section('stylesheet')
    <style>
        label.error{
            color: red !important;
            font-weight: normal !important;
        }
    </style>
@endsection
@section('content')
    <section class="contact-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-10 m-auto">
                    <div class="post-ad-place">
                        @include('frontEnd.includes.message')

                        <div class="text-center py-5">
                            <h4>{{ __('user.help_us_faster') }}</h4>
                            <p>{{ __('user.contact_description') }}</p>
                        </div>
                        <form action="{{ route('contact.store') }}" method="post" id="contactForm">
                            @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" placeholder="{{ __('user.name') }}" name="name" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="email" class="form-control" id="email" placeholder="{{ __('user.enter_email_address') }}" name="email" value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="phone_number_id" placeholder="{{ __('user.phone_number') }}" name="phone_number" value="{{ old('phone_number') }}" required>
                                @if($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="subject" placeholder="{{ __('user.subject') }}" name="subject" value="{{ old('subject') }}">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="text-end mt-3 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary">{{ __('post.submit') }}</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('frontEnd.modals.login-modal')
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script>
        $('#contactForm').validate({
            highlight: function (element) {
                $(element).css('border-color', 'red');
            },
            unhighlight: function(element) {
                $(element).css('border-color', '#dee2e6');
            },
            errorPlacement: function(error, element) {},
        });
    </script>
@endsection
