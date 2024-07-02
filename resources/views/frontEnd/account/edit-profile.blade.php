@extends('frontEnd.layouts.layout')
@section('stylesheet')

@endsection
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

</style>
@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('my-account.index') }}">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-edit-section">
        <div class="container">
            <form action="{{ route('update.profile') }}" method="post" id="edit_profile_id" enctype="multipart/form-data">
                @csrf
            <div class="row mb-3">
                <div class="col-md-8 m-auto">
                    @include('frontEnd.includes.message')

                    <h4 class="mb-2">Profile Image</h4>
                    <div class="card border-0 mb-3">
                        <div class="card-body">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="profile_img" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                                    <label for="imageUpload">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> </label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('{{ uploaded_asset_profile(auth()->user()->image) }}');"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row mt-3">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="col-md-8 m-auto">
                    <h4 class="mb-2">Profile Details</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="John Doe" value="{{ auth()->user()->name ?? ""  }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="john@gmail.com" value="{{ auth()->user()->email ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="phone_number" placeholder="+234 364 937 203" value="{{ auth()->user()->phone_number ?? "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-control" id="state_id" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}', '{{ auth()->user()->city_id }}')">
                                        <option value="">-Select-</option>
                                        @foreach(CommonFunction::getState() as $key => $state)
                                            <option value="{{ $key }}" @selected($key == auth()->user()->state_id ?? "")>{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">-Select-</option>

                                    </select>
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
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#state_id').trigger('change');
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        $(".btn-custom").on('click', function (e){
            $(e.target).parent().remove();
        });
    </script>
@endsection
