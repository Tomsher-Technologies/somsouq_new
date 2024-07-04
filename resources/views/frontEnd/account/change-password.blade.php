@extends('frontEnd.layouts.layout')
@section('stylesheet')

@endsection

@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('my-account.index') }}">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-edit-section">
        <div class="container">
            <form action="{{ route('update.password') }}" method="post" id="password_change_form">
                @csrf
            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    @include('frontEnd.includes.message')
                    <h4 class="mb-2">Change Password</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            <div class="row g-3">
{{--                                <div class="col-md-6">--}}
{{--                                    <label class="form-label">Current Password</label>--}}
{{--                                    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Enter your current password" name="current_password">--}}

{{--                                    @if($errors->has('current_password'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('current_password') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                <div class="col-md-6">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Enter your new password" name="new_password">
                                    @if($errors->has('new_password'))
                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Confirm password" name="password_confirmation">
                                    @if($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-8 m-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>

        </div>
    </section>
@endsection

@section('script')
@endsection


