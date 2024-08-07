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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('my-account.index') }}">{{ __('user.account') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('user.edit_profile') }}</li>
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

                <input type="hidden" value="{{ $companyInfo->id ?? "" }}" name="company_id">
                <div class="row mb-3">
                    <div class="col-md-8 m-auto">
                        @include('frontEnd.includes.message')

                        <h4 class="mb-2">{{ __('user.profile_image') }}</h4>
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="profile_img" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                                        <label for="imageUpload">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('{{ uploaded_asset_profile(webUser()->image) }}');"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row mt-3">
                    <input type="hidden" name="user_id" value="{{ webUser()->id }}">
                    <div class="col-md-8 m-auto">
                        <h4 class="mb-2">{{ __('user.profile_details') }}</h4>
                        <div class="card p-3 border-0">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.account_type') }}</label>
                                        <select class="form-control" name="account_type" id="sign_up_for" onchange="getUserType(this.value)" required>
                                            <option value="">-select-</option>
                                            <option value="individual" {{ webUser()->sign_up_for == 'individual' ? "selected" : ""  }}>{{ __('user.individual') }}</option>
                                            <option value="company" {{ webUser()->sign_up_for == 'company' ? "selected" : ""  }}>{{ __('user.company') }}</option>
                                        </select>

                                        @if($errors->has('account_type'))
                                            <span class="text-danger">{{ $errors->first('account_type') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.name') }}</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="John Doe" value="{{ webUser()->name ?? ""  }}" required>

                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.email') }}</label>
                                        <input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="john@gmail.com" value="{{ webUser()->email ?? "" }}">
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.gender') }}</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="male" {{ webUser()->gender == 'male' ? "selected" : ""  }}>{{ __('user.male') }}</option>
                                            <option value="female" {{ webUser()->sign_up_for == 'female' ? "selected" : ""  }}>{{ __('user.female') }}</option>
                                            <option value="other" {{ webUser()->sign_up_for == 'other' ? "selected" : ""  }}>{{ __('user.other') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.mobile') }}</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="phone_number" placeholder="+234 364 937 203" value="{{ webUser()->phone_number ?? "" }}" required>
                                        @if($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('user.whats_app_number') }}</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="w_app_number" placeholder="+234 364 937 203" value="{{ webUser()->w_app_number ?? "" }}">
                                    </div>


                                    <div class="col-md-6" id="company_type_div" style="display: none">
                                        <label class="form-label">{{ __('user.company_type') }}</label>
                                        <input type="text" class="form-control" name="company_type" id="company_type_id" placeholder="{{ __('user.enter_company_type') }}" required>
                                    </div>

                                    <div class="col-md-6" id="company_name_div" style="display: none">
                                        <label class="form-label">{{ __('user.company_name') }}</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name_id" value="{{ $companyInfo->company_name ?? "" }}" placeholder="{{ __('user.enter_company_name') }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('post.state') }}</label>
                                        <select class="form-control" id="state_id" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}', '{{ webUser()->city_id }}')" required>
                                            <option value="">-{{ __('post.select') }}-</option>
                                            @foreach(CommonFunction::getState() as $state)
                                                <option value="{{ $state->id }}" @selected($state->id == webUser()->state_id ?? "")>{{ $state->getTranslation('name', getLocaleLang()) }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('state_id'))
                                            <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('post.city') }}</label>
                                        <select class="form-control" name="city_id" id="city_id" required>
                                            <option value="">-{{ __('post.select') }}-</option>

                                        </select>

                                        @if($errors->has('city_id'))
                                            <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-8 m-auto text-end">
                        <button type="button" class="btn btn-outline-step" onclick="goForDelete()">Delete Account</button>
                        <button type="submit" class="btn btn-primary">{{ __('user.save') }}</button>
                    </div>
                </div>

            </form>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#state_id').trigger('change');
            $('#sign_up_for').trigger('change');
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

        $('#edit_profile_id').validate({
            highlight: function (element) {
                $(element).css('border-color', 'red');
            },
            unhighlight: function(element) {
                $(element).css('border-color', '#dee2e6');
            },
            errorPlacement: function(error, element) {},
        });

        function getUserType(selected)
        {
            if(selected === 'company') {
                document.getElementById('company_type_div').style.display = 'block';
                document.getElementById('company_name_div').style.display = 'block';

                $("#company_type_id").prop('required',true);
                $("#company_name_id").prop('required',true);
            } else {
                document.getElementById('company_type_div').style.display = 'none';
                document.getElementById('company_name_div').style.display = 'none';

                $("#company_type_id").prop('required',false);
                $("#company_name_id").prop('required',false);
            }
        }


        function goForDelete()
        {
            Swal.fire({
                title: "Do you really want to delete your account?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Delete",
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-step'
                }
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('user.delete') }}",
                        type: 'get',
                        data: {
                            user_id: "{{ webUser()->id }}",
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.success) {
                                window.location.href = response.url;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr, status, error)
                        }
                    });

                    // Swal.fire("Saved!", "", "success");
                }
            });
        }



    </script>
@endsection
