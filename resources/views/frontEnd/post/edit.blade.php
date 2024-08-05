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

        section.post-ad-section .edit-image {
            position: relative;
            border-radius: 6px;
        }
        section.post-ad-section .edit-image a {
            color: #ffffff;
        }
        section.post-ad-section .edit-image::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background: rgb(0, 0, 0);
            background: linear-gradient(211deg, rgb(0, 0, 0) 0%, rgba(247, 154, 64, 0) 100%);
            opacity: 0.5;
            border-radius: 6px;
        }
        section.post-ad-section .edit-image .edit-overly {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 999;
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

                    <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data" id="multi-step-form">
                        @csrf
                        <input type="hidden" name="category_id" id="final_category_id" value="{{$post->category_id}}">
                        <input type="hidden" name="previous_category_id" id="previous_category_id" value="{{$post->category_id}}">
                        <input type="hidden" name="post_id" id="final_post_id" value="{{$post->id}}">
                        <input type="hidden" name="input_type" value="edit">

                        <div class="step step-1">
                            <!-- Step 1 content here -->
                            <div class="post-ad-types">
                                <div class="row g-3">
                                    @foreach($categories as $category)
                                        <div class="col-6 col-md-2" style="cursor: pointer">
                                            <label>
                                                <div class="categories-box type_select {{ ($category->id == $post->category_id) ? 'active' : '' }}" data-id="{{$category->id}}">
                                                    <input type="checkbox" class="checked-category" name="check_category_id" value="{{ $post->category_id }}" id="check_category_{{$category->id}}"  {{ ($category->id == $post->category_id) ? 'checked' : '' }} required>
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
                            {{--                            <div class="d-flex align-items-center justify-content-end g-2">--}}
                            {{--                                <button type="button" class="btn btn-primary next-step pe-3">Next <i class="bi bi-chevron-right ms-2"></i></button>--}}
                            {{--                            </div>--}}
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
                                        <select class="form-select" aria-label="Default select example" id="state_id" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}', '{{ $post->city_id }}')" required>
                                            <option value="">{{ __('post.state') }}</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" @selected($post->state_id == $state->id)>{{ $state->getTranslation('name', getLocaleLang()) }}</option>
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
                            <!-- Step 4 d-flex align-items-center justify-content-end gap-2 here -->

                            <div class="post-ad-place">
                                <h4>{{ __('post.upload_high_quality_photo') }}</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="drag-and-drop">
                                            <input type="file" name="file[]" class="uploadifyfile" accept="image/*" multiple>
                                        </div>
                                    </div>

                                    @forelse($images as $image)
                                        <div class="col-md-2" id="image_div_{{$image->id}}">
                                            <input type="hidden" name="upload_file_ids[]" value="{{ $image->id }}">
                                            <div class="edit-image">
                                                <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" class="rounded-2" alt="{{ $image->file_original_name }}" width="100%" height="144">
                                                <div class="edit-overly">
                                                    <button type="button" onclick="removeImage('{{ $image->id }}')" class="btn-close btn-close-white" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

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
                                <button type="button" class="btn btn-primary next-step">
                                    @if($post->status === 'rejected')
                                        {{ __('user.re_submit') }}
                                    @else
                                        {{ __('post.submit') }}
                                    @endif

                                </button>
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
        let title_post_edit = "{{ __('messages.title_post_edit') }}";
        let go_my_account = "{{ __('messages.go_my_account') }}";
        let go_home = "{{ __('messages.go_home') }}";
    </script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/imageuploadify.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getSubCategoryByCategory.js') }}"></script>
    <script>
        $(document).ready(function (){
            var currentStep = 1;
            var toNextStep;
            var updateProgressBar;
            var inputForm = $("#multi-step-form");

            inputForm.validate({
                rules: {
                    price: {
                        required: true,
                        numberNoNegative: true
                    }
                },
                onfocusout: function (element) {
                    if($(element).is(":checkbox")) {
                        this.element(element);
                    }
                },
                highlight: function (element) {
                    $(element).focus();
                    $(element).css('border-color', 'red');
                    $(element).next().css({'color': 'red', 'float' : 'left'});

                    if($(element).is(":checkbox")) {
                        $(element).parent().addClass('checkbox-error');
                    }
                },
                unhighlight: function(element) {
                    $(element).css('border-color', '#dee2e6');

                    if($(element).is(":checkbox")) {
                        $(element).parent().removeClass('checkbox-error');
                    }
                },
                errorPlacement: function(error, element) {

                },
            });

            function displayStep(stepNumber) {
                if (stepNumber >= 1 && stepNumber <= 5) {
                    $(".step-" + currentStep).hide();
                    $(".step-" + stepNumber).show();
                    currentStep = stepNumber;
                    updateProgressBar();
                }
            }

            // $(document).ready(function() {

            $('#multi-step-form').find('.step').slice(1).hide();
            let previous_category = $('#previous_category_id').val();

            $('.categories-box').on('click', function () {
                let checkbox = $(this).find("input[type=checkbox]");

                if(checkbox.is(":checked")) {
                    $('#final_category_id').val(parseInt($(this).attr("data-id")));
                    // if(previous_category != parseInt($(this).attr("data-id"))) {
                    getSubCategoryByCategory($(this).attr("data-id"), 'sub_category_id', '{{ route('get-subCategories-by-category') }}', '{{ $post->sub_category_id }}')
                    // }

                    toNextStep();
                }
            });

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
            // });
        });

        $(document).ready(function() {
            $('input[type="file"]').imageuploadify();

            $('.btn-default').trigger('change');

            {{--getSubCategoryByCategory('{{ $post->category_id }}', 'sub_category_id', '{{ route('get-subCategories-by-category') }}', '{{ $post->sub_category_id }}');--}}

            $('#state_id').trigger('change');
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
                        post_id: '{{ $post->id }}'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status){
                            $('#loadCategoryDetailHtml').html(response.html);

                            if(parseInt(categoryId) === 5) {
                                let fashion_type = '#type_' + setLocalLang;
                                $('#loadCategoryDetailHtml').find(fashion_type).trigger('change');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }


        function removeImage(imageId)
        {
            $('#image_div_' + imageId).remove();
        }

        //placeholder name change sub category
        $('#sub_category_id').on('change', function (e) {
            if(e.target.value == 19){
                $('#post_price_id').attr("placeholder", "Price per-day");
            }else {
                $('#post_price_id').attr("placeholder", "Price");
            }
        });

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

                                if (parseInt(value.id) === parseInt(old_data)) {
                                    console.log(value.id)
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
