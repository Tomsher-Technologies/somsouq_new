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
                                                    <h4>{{ $category->en_name }}</h4>
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
                                        <h4>Select one sub category</h4>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <select class="form-select" aria-label="Default select example" name="sub_category_id" id="sub_category_id" onchange="getCategoryDetailPage(this.value)" required>
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> Previous</button>
                                <button type="button" class="btn btn-primary next-step pe-3">Next <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>


                        </div>

                        <div class="step step-3">
                            <!-- Step 3 d-flex align-items-center justify-content-end gap-2 here -->

                            <div class="post-ad-place">
                                <h4>Where should we place your Ad?</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}')" required>
                                            <option value="">Select State</option>
                                            @foreach($states as $key => $state)
                                                <option value="{{ $key }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="city_id" id="city_id" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> Previous</button>
                                <button type="button" class="btn btn-primary next-step pe-3">Next <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </div>

                        <div class="step step-4">
                            <!-- Step 4 d-flex align-items-center justify-content-end gap-2 here -->

                            <div class="post-ad-place">
                                <h4>Add Details</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="Ad Title" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control number" id="post_price_id" placeholder="Price" name="price" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="drag-and-drop">
                                            <input type="file" name="file[]" id="file_id" class="uploadifyfile checked-category display-block" accept="image/*" multiple required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="file-upload-info">
                                            <h5>Please read below, so your Ad gets approved :</h5>
                                            <ul>
                                                <li>
                                                    The photo of woman is not allowed
                                                </li>
                                                <li>The photo you are taking must be clear</li>
                                                <li>Take multiple different angle photos of the product</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> Previous</button>
                                <button type="button" class="btn btn-primary next-step pe-3">Next <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </div>

                        <div class="step step-5">
                            <!-- Step 5 content here -->
                            <div id="loadCategoryDetailHtml">

                            </div>

                            <div class="d-flex align-content-center justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-step prev-step ps-3"><i class="bi bi-chevron-left me-2"></i> Previous</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/frontEnd/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/imageuploadify.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getSubCategoryByCategory.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script>
        $(document).ready(function () {
            var currentStep = 1;
            var updateProgressBar;
            var toNextStep;
            var inputForm = $("#multi-step-form");

            function displayStep(stepNumber) {
                if (stepNumber >= 1 && stepNumber <= 5) {
                    $(".step-" + currentStep).hide();
                    $(".step-" + stepNumber).show();
                    currentStep = stepNumber;
                    updateProgressBar();
                }
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

            $(".next-step").click(function() {
                toNextStep();
            });


            toNextStep = function () {

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

                if(!inputForm.valid()) {
                    return false;
                }

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

        //placeholder name change sub category
        $('#sub_category_id').on('change', function (e) {
            if(e.target.value == 19){
                $('#post_price_id').attr("placeholder", "Price per-day");
            }else {
                $('#post_price_id').attr("placeholder", "Price");
            }
        })
    </script>
@endsection
