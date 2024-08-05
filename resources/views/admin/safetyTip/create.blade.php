@extends('admin.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">Safety Tip Information</h5>
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-body p-0">
                    <nav>
                        <div class="nav nav-tabs nav-pills" id="nav-tab" role="tablist">
                            @foreach ($languages as $key => $language)
                                <a class="nav-link @if ($loop->iteration == 1) active @endif" id="nav-{{ $language->app_lang_code }}-tab" data-toggle="tab" href="#nav-{{ $language->app_lang_code }}" role="tab" aria-controls="nav-{{ $language->app_lang_code }}" aria-selected="true">
                                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                                    <span>{{ $language->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </nav>

                    <form class="p-4" action="{{ route('safety_tip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="nav-tabContent">
                            <div class="form-group mb-3">
                                <label class="col-form-label">Category<span class="required">*</span></label>
                                <select class="form-control" name="category_id">
                                    <option value="">-Select-</option>
                                    @foreach(CommonFunction::getCategory() as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>{{ $category->en_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>

                            {{--                        english--}}
                            <div class="tab-pane fade  show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Safety Tip</label>
                                    <textarea class="form-control" placeholder="Enter safety tip" name="tip_en" id="tip_en">{{ old('tip_en') }}</textarea>

                                    @if($errors->has('tip_en'))
                                        <span class="text-danger">{{ $errors->first('tip_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--                        english--}}

                            {{--                        arabic--}}
                            <div class="tab-pane fade" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Safety Tip</label>
                                    <textarea class="form-control" placeholder="Enter Description" name="tip_ar" id="tip_ar">
                                        {{ old('tip_ar') }}
                                    </textarea>
                                </div>
                            </div>
                            {{--                        arabic--}}

                            {{--                        somali--}}
                            <div class="tab-pane fade" id="nav-so" role="tabpanel" aria-labelledby="nav-so-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Safety Tip</label>
                                    <textarea class="form-control" placeholder="Enter safety tip" name="tip_so" id="tip_so">
                                        {{ old('tip_so') }}
                                    </textarea>
                                </div>
                            </div>
                            {{--                        somali--}}

                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{{ route('safety_tip.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="{{ static_asset('assets/js/tinymce/tinymce.min.js') }}" ></script>
    <script>
        tinymce.init({
            selector: 'textarea#tip_en',
            license_key: 'gpl',
            promotion: false,
            branding: false,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        tinymce.init({
            selector: 'textarea#tip_ar',
            license_key: 'gpl',
            directionality : 'rtl',
            promotion: false,
            branding: false,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | bullist numlist | alignleft aligncenter ' +
                'alignright alignjustify | outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        tinymce.init({
            selector: 'textarea#tip_so',
            license_key: 'gpl',
            promotion: false,
            branding: false,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | bullist numlist | alignleft aligncenter ' +
                'alignright alignjustify | outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endsection
