@extends('frontEnd.layouts.layout')

@section('stylesheet')
    <style>
        .checked-category {
            opacity:0;
        }

        .checkbox-error {
            border: 1px red solid !important;
        }
        .categories-box {
            cursor: pointer;
        }
        .display-block {
            display: block !important;
            position: relative;
            top: 50px;
        }
        .border-color {
            border-color: red;
        }

        .imageuploadify, .well {
            top: -30px;
        }
    </style>
@endsection
@section('content')
    <section class="post-ad-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="progress px-1">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="step-container d-flex justify-content-between">
                        <div class="step-circle circle-1 active" onclick="displayStep(1)">1</div>
                        <div class="step-circle circle-2" onclick="displayStep(2)">2</div>
                        <div class="step-circle circle-3" onclick="displayStep(3)">3</div>
                        <div class="step-circle circle-4" onclick="displayStep(4)">4</div>
                        <div class="step-circle circle-5" onclick="displayStep(5)">5</div>
                    </div>
                </div>
                <div class="col-md-12">

                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" id="multi-step-form">
                        @csrf
                        <input type="hidden" name="category_id" id="final_category_id">
                        <input type="hidden" name="input_type" value="add">

                        <div class="step step-1">
                            <!-- Step 1 content here -->
                            <div class="post-ad-types">
                                <div class="row g-3">
                                    @foreach($categories as $category)
                                        <div class="col-6 col-md-2" style="cursor: pointer">
                                            <label>
                                                <div class="categories-box type_select">
                                                    <input type="checkbox" class="checked-category" name="check_category_id" value="{{$category->id}}" id="check_category_{{$category->id}}" required>
                                                    @if ($category->icon != null)
                                                        <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                                                    @endif
                                                    <h4>{{ $category->getTranslation('name', getLocaleLang()) ?? $category->en_name }}</h4>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="step step-2">
                            <!-- Step 2 content here -->

                            <div class="row ">
                                <div class="col-md-12 ">
                                    <div class="post-ad-place">
                                        <h4>{{ __('post.select_one_sub_category') }}</h4>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <select class="form-select" aria-label="Default select example" name="sub_category_id" id="sub_category_id" onchange="getCategoryDetailPage(this.value)" required>
                                                    <option value="">{{ __('post.select_sub_category') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> {{ __('post.previous') }}</button>
                                <button type="button" class="btn btn-primary next-step pe-3">{{ __('post.next') }} <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>


                        </div>

                        <div class="step step-3">
                            <!-- Step 3 d-flex align-items-center justify-content-end gap-2 here -->

                            <div class="post-ad-place">
                                <h4>{{ __('post.location_title') }}</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}')" required>
                                            <option value="">{{ __('post.state') }}</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->getTranslation('name', getLocaleLang()) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="city_id" id="city_id" required>
                                            <option value="">{{ __('post.city') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> {{ __('post.previous') }}</button>
                                <button type="button" class="btn btn-primary next-step pe-3">{{ __('post.next') }} <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </div>

                        <div class="step step-4">
                            <div class="post-ad-place">
                                <h4>{{ __('post.upload_high_quality_photo') }}</h4>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="drag-and-drop">
                                            <input type="file" name="file[]" id="file_id" class="uploadifyfile checked-category display-block" accept="image/*" multiple required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="file-upload-info">
                                            <h5>{{ __('post.please_read') }} :</h5>
                                            <ul>
                                                <li>{{ __('post.instructions.1') }}</li>
                                                <li>{{ __('post.instructions.2') }}</li>
                                                <li>{{ __('post.instructions.3') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> {{ __('post.previous') }}</button>
                                <button type="button" class="btn btn-primary next-step pe-3">{{ __('post.next') }} <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </div>

                        <div class="step step-5">
                            <!-- Step 5 content here -->
                            <div class="post-ad-place">
                                <h4>{{ __('post.add_details') }}</h4>

                                <div class="row g-3" id="loadCategoryDetailHtml">

                                </div>
                            </div>

                            <div class="d-flex align-content-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> {{ __('post.previous') }}</button>
                                <button type="button" class="btn btn-primary next-step">{{ __('post.submit') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        let title_post_add = "{{ __('messages.title_post_add') }}";
        let text_post_add = "{{ __('messages.text_post_add') }}";
        let go_my_account = "{{ __('messages.go_my_account') }}";
        let go_home = "{{ __('messages.go_home') }}";
    </script>

    <script src="{{ asset('assets/frontEnd/js/imageuploadify.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getSubCategoryByCategory.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script>
        $(document).ready(function () {

            var inputForm = $("#multi-step-form");
            var currentStep = 1;
            var updateProgressBar;
            var toNextStep;

            inputForm.validate({
                rules: {
                    price: {
                        required: true,
                        numberNoNegative: true
                    },
                },
                onfocusout: function (element) {
                    if($(element).is(":checkbox")) {
                        this.element(element);
                    }
                    if($(element).is(":file")) {
                        if($(element).valid()) {
                            $(element).next().removeClass('border-color');
                        }
                        this.element(element);
                    }
                },
                highlight: function (element) {
                    $(element).focus();
                    $(element).css('border-color', 'red');

                    if($(element).is(":file")) {
                        $(element).next().addClass('border-color');
                    } else {
                        $(element).next().css({'color': 'red', 'float' : 'left'});
                    }

                    if($(element).is(":checkbox")) {
                        $(element).parent().addClass('checkbox-error');
                    }
                },
                unhighlight: function(element) {
                    $(element).css('border-color', '#dee2e6');

                    if($(element).is(":checkbox")) {
                        $(element).parent().removeClass('checkbox-error');
                    }
                    if($(element).is(":file")) {
                        $(element).next().removeClass('border-color');
                    }

                },
                errorPlacement: function(error, element) {},
            });

            function displayStep(stepNumber) {
                if (stepNumber >= 1 && stepNumber <= 5) {
                    $(".step-" + currentStep).hide();
                    $(".step-" + stepNumber).show();
                    currentStep = stepNumber;
                    updateProgressBar();
                }
            }


            $(".next-step").click(function() {
                if(!inputForm.valid()) {
                    return false;
                }
                if(currentStep === 5) {
                    inputForm.submit();
                }
                toNextStep();
            });

            toNextStep = function () {
                if (currentStep < 5) {
                    $(".step-" + currentStep).addClass("");
                    $(".circle-" + parseInt(currentStep + 1)).addClass("active");
                    currentStep++;
                    setTimeout(function() {
                        $(".step").removeClass("").hide();
                        $(".step-" + currentStep).show().addClass("");
                        updateProgressBar();
                    }, 500);
                }
            }

            $(".prev-step").click(function() {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass("");
                    currentStep--;
                    $(".circle-" + parseInt(currentStep + 1)).removeClass("active");
                    setTimeout(function() {
                        $(".step").removeClass("").hide();
                        $(".step-" + currentStep).show().addClass("");
                        updateProgressBar();
                    }, 500);
                }
            });
            updateProgressBar = function() {
                var progressPercentage = ((currentStep - 1) / 4) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            }


            $('#multi-step-form').find('.step').slice(1).hide();

            $('input[type="checkbox"]').on('change', function() {
                $('input[type="checkbox"]').not(this).prop('checked', false);

                $('.categories-box').not(this).removeClass("active");

                if($('input[type="checkbox"]').is(':checked')) {
                    $('#final_category_id').val(parseInt(this.value));
                    $(this).parent().addClass('active');
                    getSubCategoryByCategory(this.value, 'sub_category_id', '{{ route('get-subCategories-by-category') }}');
                    toNextStep();
                } else {
                    $('#final_category_id').val("");
                    $(this).parent().removeClass('active');
                }
            });

            $('input[type="file"]').imageuploadify()
        });


        function getCategoryDetailPage(subCategoryId) {
            let categoryId = $('#final_category_id').val();
            $('#loadCategoryDetailHtml').html("");

            if(categoryId != "" && subCategoryId != ""){
                $.ajax({
                    url: "{{ route('load-category-detail-form') }}",
                    type: 'get',
                    data: {
                        category_id:categoryId,
                        sub_category_id:subCategoryId,
                        post_id:""
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status){
                            $('#loadCategoryDetailHtml').html(response.html);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }


        $('body').on('change keyup paste', '.trigger-event',function (e) {
            let input = e.target;
            let currentInputId = input.getAttribute('id').slice(0, -2);

            if(setLocalLang = 'en') {
                $('#' + currentInputId + 'ar').val(input.value);
                $('#' + currentInputId + 'so').val(input.value);
            }

            if(setLocalLang = 'ar') {
                $('#' + currentInputId + 'en').val(input.value);
                $('#' + currentInputId + 'so').val(input.value);
            }

            if(setLocalLang = 'so') {
                $('#' + currentInputId + 'en').val(input.value);
                $('#' + currentInputId + 'ar').val(input.value);
            }
        });

        function getTypeWiseSize(typeId, old_data)
        {
            if (typeof old_data === 'undefined') {
                old_data = 0;
            }
            if(typeId !== "" ) {
                $.ajax({
                    url: "{{ route('fashion-type.size') }}",
                    type: 'get',
                    data: {
                        type_id: typeId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var option = '<option value="">-' + select + '-</option>';
                        if (response.status) {
                            $.each(response.data, function (id, value) {
                                //let data = JSON.parse(value);

                                if (value.id === old_data) {
                                    option += '<option value="' + value.id + '" selected>' + value.name + '</option>';
                                } else {
                                    option += '<option value="' + value.id + '">' + value.name + '</option>';
                                }
                            });
                        }
                        $("#size_so").html(option);
                        $("#size_en").html(option);
                        $("#size_ar").html(option);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }

    </script>
@endsection
