@extends('frontEnd.layouts.layout')

@section('stylesheet')
    <style>
        .checked-category {
            opacity:0;
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
                        <div class="step-circle" onclick="displayStep(1)">1</div>
                        <div class="step-circle" onclick="displayStep(2)">2</div>
                        <div class="step-circle" onclick="displayStep(3)">3</div>
                        <div class="step-circle" onclick="displayStep(4)">4</div>
                        <div class="step-circle" onclick="displayStep(5)">5</div>
                    </div>
                </div>
                <div class="col-md-12">

                    <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data" id="multi-step-form">
                        @csrf
                        <input type="hidden" name="category_id" id="final_category_id" value="{{$post->category_id}}">
                        <input type="hidden" name="previous_category_id" id="previous_category_id" value="{{$post->category_id}}">
                        <input type="hidden" name="post_id" id="final_category_id" value="{{$post->id}}">
                        <input type="hidden" name="input_type" value="edit">

                        <div class="step step-1">
                            <!-- Step 1 content here -->
                            <div class="post-ad-types">
                                <div class="row g-3">
                                    @foreach($categories as $category)
                                        <div class="col-6 col-md-2" style="cursor: pointer">
                                            <div class="categories-box type_select {{ ($category->id == $post->category_id) ? 'active' : '' }}" data-id="{{$category->id}}">
                                                <input type="checkbox" class="checked-category" name="check_category_id[]" id="check_category_id"  {{ ($category->id == $post->category_id) ? 'checked' : '' }} required>
                                                @if ($category->icon != null)
                                                    <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                                                @endif
                                                <h4>{{ $category->en_name }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end g-2">
                                <button type="button" class="btn btn-primary next-step pe-3">Next <i class="bi bi-chevron-right ms-2"></i></button>
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
                                        <select class="form-select" aria-label="Default select example" id="state_id" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}', '{{ $post->city_id }}')" required>
                                            <option value="">Select State</option>
                                            @foreach($states as $key => $state)
                                                <option value="{{ $key }}" @selected($post->state_id == $key)>{{ $state }}</option>
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
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="Ad Title" value="{{ $post->title ?? "" }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="formGroupExampleInput" value="{{ $post->price ?? "" }}" placeholder="Price" name="price" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{ $post->description ?? "" }}</textarea>
                                    </div>
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
        </div>
    </section>


@endsection

@section('script')
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/imageuploadify.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/getSubCategoryByCategory.js') }}"></script>
    <script>
        $(document).ready(function (){
            var currentStep = 1;
            var updateProgressBar;
            var inputForm = $("#multi-step-form");

            function displayStep(stepNumber) {
                if (stepNumber >= 1 && stepNumber <= 5) {
                    $(".step-" + currentStep).hide();
                    $(".step-" + stepNumber).show();
                    currentStep = stepNumber;
                    updateProgressBar();
                }
            }

            $(document).ready(function() {
                $('#multi-step-form').find('.step').slice(1).hide();

                $(".next-step").click(function() {
                    inputForm.validate({
                        rules: {
                            price: {
                                required: true,
                                numberNoNegative: true
                            }
                        },
                        onfocusout: false,
                        highlight: function (element) {
                            $(element).focus();
                            $(element).css('border-color', 'red');
                            $(element).next().css({'color': 'red', 'float' : 'left'});
                            $(element).parent().css('border-color', 'red');
                        },
                        unhighlight: function(element) {
                            $(element).css('border-color', '#dee2e6');
                            $(element).parent().css('border-color', '#dee2e6');
                        },
                        errorPlacement: function(error, element) {},
                    });

                    if(!inputForm.valid()) {
                        return false;
                    }

                    if (currentStep < 5) {
                        $(".step-" + currentStep).addClass("");
                        currentStep++;
                        setTimeout(function() {
                            $(".step").removeClass("").hide();
                            $(".step-" + currentStep).show().addClass("");
                            updateProgressBar();
                        }, 500);
                    }
                });

                $(".prev-step").click(function() {
                    if (currentStep > 1) {
                        $(".step-" + currentStep).addClass("");
                        currentStep--;
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
            });
        });

        $('.type_select').click(function(){
            if(!$(this).hasClass('active')) {
                $('#final_category_id').val(parseInt($(this).attr("data-id")));
                getSubCategoryByCategory($(this).attr("data-id"), 'sub_category_id', '{{ route('get-subCategories-by-category') }}')
            }else {
                $('#final_category_id').val("");
            }

            let checkbox = $(this).find("input[type=checkbox]");

            if(checkbox.is(":checked")) {
                $('.checked-category').attr("checked", false)
            } else {
                $('.checked-category').attr("checked", false);
                $(this).find("input[type=checkbox]").attr("checked", true)
            }

            $('.type_select').not(this).removeClass("active");
            $(this).toggleClass("active");
        });

        $(document).ready(function() {
            $('input[type="file"]').imageuploadify();

            $('.btn-default').trigger('change');

            getSubCategoryByCategory('{{ $post->category_id }}', 'sub_category_id', '{{ route('get-subCategories-by-category') }}', '{{ $post->sub_category_id }}');

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

        $(".btn-custom").on('click', function (e){
            $(e.target).parent().remove();
        });

    </script>


@endsection
