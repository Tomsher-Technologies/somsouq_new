@extends('frontEnd.layouts.layout')

@section('stylesheet')
    <style>
        .tab {
            display: none;
        }

    </style>
@endsection
@section('content')
    <section class="post-ad-section">
        <div class="container">
            <div class="row">

                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" id="postForm">
                    @csrf
                    <div class="tab">
                        <div class="col-md-12 m-auto">
                            <div class="post-ad-types">
                                <div class="row g-3">
                                    <input type="hidden" name="category_id" id="final_category_id">
                                    @foreach($categories as $category)
                                        <div class="col-6 col-md-2">
                                            <div class="categories-box type_select" data-id="{{$category->id}}">
                                                <input type="checkbox" class="checked-category" name="check_category_id" id="check_category_id">


                                                @if ($category->icon != null)
                                                    <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                                                @endif

                                                <h4>{{ $category->en_name }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                                {{--                        <div class="text-end mt-3">--}}
                                {{--                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>--}}
                                {{--                        </div>--}}

                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="col-md-8 m-auto">
                            <div class="post-ad-place">
                                <h4>Select one sub category</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="sub_category_id" id="sub_category_id" onchange="getCategoryDetailPage(this.value)">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>

                                {{--                            <div class="text-end mt-3 d-flex align-items-center justify-content-between">--}}
                                {{--                                <a href="post-ad-type.html" class="btn btn-primary">Back</a>--}}
                                {{--                                <a href="post-ad-details.html" class="btn btn-primary">Next</a>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="col-md-8 m-auto">
                            <div class="post-ad-place">
                                <h4>Where should we place your Ad?</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="state_id" onChange="getCityByStateId(this.value, 'city_id', '{{ route('get-city-by-state-id') }}')">
                                            <option value="">Select State</option>
                                            @foreach($states as $key => $state)
                                                <option value="{{ $key }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <select class="form-select" aria-label="Default select example" name="city_id" id="city_id">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>

                                </div>

                                {{--                            <div class="text-end mt-3 d-flex align-items-center justify-content-between">--}}
                                {{--                                <a href="post-ad-type.html" class="btn btn-primary">Back</a>--}}
                                {{--                                <a href="post-ad-details.html" class="btn btn-primary">Next</a>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="col-md-8 m-auto">
                            <div class="post-ad-place">
                                <h4>Add Details</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="Ad Title">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Price" name="price">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descrption" name="description"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="drag-and-drop">
                                            <input type="file" name="file[]" class="uploadifyfile" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx                            ,video/*,.ppt,.pptx,.txt,.pdf" multiple>
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



                                <hr class="my-4">

                                {{--                            <div class="text-end mt-3 d-flex align-items-center justify-content-between">--}}
                                {{--                                <a href="post-ad-place.html" class="btn btn-primary">Back</a>--}}
                                {{--                                <a href="post-ad-about.html" class="btn btn-primary">Next</a>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>

                    <div id="loadCategoryDetailHtml">

                    </div>

                    <div class="col-md-8 m-auto">
                        <div class="post-ad-place">
                            <div class="text-end mt-3 d-flex align-items-center justify-content-between">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                    </div>

                </form>


                <div class="col-md-10 m-auto pt-5">
                    <img src="assets/images/add-banner.png" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/frontEnd/js/imageuploadify.js') }}"></script>
    <script src="{{ asset('custom-js/getCityByStateId.js') }}"></script>
    <script>
        $('.type_select').click(function(){

            if(!$(this).hasClass('active')) {
                $('#final_category_id').val(parseInt($(this).attr("data-id")));
                getSubCategoryByCategory($(this).attr("data-id"), 'sub_category_id', '{{ route('get-subCategories-by-category') }}')
            }else {
                $('#final_category_id').val("");
                getSubCategoryByCategory($(this).attr("data-id"), 'sub_category_id', '{{ route('get-subCategories-by-category') }}')
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
            $('input[type="file"]').imageuploadify()
            //console.log($('input[type="file"]').imageuploadify());
        })
    </script>


    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Post an Ad";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                // document.getElementById("postForm").submit()
                document.getElementById("nextBtn").type = "submit";

                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            return true;
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

           console.log(y.length)
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            return valid; // return the valid status
        }



        function getSubCategoryByCategory(category_id, sub_category_id, url){
            if(category_id != "" ){
                $.ajax({
                    url: url,
                    type: 'get',
                    data: {
                        category_id:category_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var option = '<option value="">-Select-</option>';

                        if (response.status) {
                            $.each(response.data, function (id, value) {
                                option += '<option value="' + value.id + '">' + value.en_name + '</option>';
                            });
                        }

                        $("#" + sub_category_id).html(option);

                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }

        function getCategoryDetailPage(subCategoryId) {
            let categoryId = $('#final_category_id').val();
            $('#loadCategoryDetailHtml').html("");

            if(categoryId != "" && subCategoryId != ""){
                $.ajax({
                    url: "{{ route('load-category-detail-form') }}",
                    type: 'get',
                    data: {
                        category_id:categoryId,
                        sub_category_id:subCategoryId
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
            //console.log()
        }


    </script>


@endsection