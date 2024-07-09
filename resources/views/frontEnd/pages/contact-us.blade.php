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
                            <h4>Help us help you faster!</h4>
                            <p>Accurately selecting your specific issue from the drop-down lists below will enable us to direct your message to the right deparment. Once you select your issue, you will be able to contact us.</p>
                        </div>
                        <form action="{{ route('contact.store') }}" method="post" id="contactForm">
                            @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="email" class="form-control" id="email" placeholder="Your email address" name="email" value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}" required>
                                @if($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="text-end mt-3 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script>
        $('#contactForm').validate();
    </script>
@endsection
