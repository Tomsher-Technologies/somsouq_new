@extends('admin.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">Buy Sell Information</h5>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
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

                    <form class="p-4" action="{{ route('buy.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="nav-tabContent">
                            <div class="form-group mb-3">
                                <label for="name">Content Type</label>
                                <select class="select2 form-control aiz-selectpicker" name="content_type_id" data-selected="" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                    @foreach ($contentType as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('content_type_id'))
                                    <span class="text-danger">{{ $errors->first('content_type_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Priority no.</label>
                                <input type="number" placeholder="Enter priority no" value="{{ old('priority') }}" name="priority" class="form-control">
                                @if($errors->has('priority'))
                                    <span class="text-danger">{{ $errors->first('priority') }}</span>
                                @endif
                            </div>
                            {{--                        english--}}
                            <div class="tab-pane fade  show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Title</label>
                                    <input type="text" placeholder="Enter Title" value="{{ old('title_en') }}" name="title_en" class="form-control">

                                    @if($errors->has('title_en'))
                                        <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" name="description_en" id="description_en">{{ old('description_en') }}</textarea>

                                    @if($errors->has('description_en'))
                                        <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--                        english--}}

                            {{--                        arabic--}}
                            <div class="tab-pane fade" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Title</label>
                                    <input type="text" placeholder="Enter Title" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" name="description_ar" id="description_ar">{{ old('description_ar') }}</textarea>
                                </div>
                            </div>
                            {{--                        arabic--}}

                            {{--                        somali--}}
                            <div class="tab-pane fade" id="nav-so" role="tabpanel" aria-labelledby="nav-so-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Title</label>
                                    <input type="text" placeholder="Enter Title" value="{{ old('title_so') }}" name="title_so" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" name="description_so" id="description_so">{{ old('description_so') }}</textarea>
                                </div>
                            </div>
                            {{--                        somali--}}

                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{{ route('buy.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
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
            selector: 'textarea#description_en',
            promotion: false,
            branding: false,
            height: 300,
            license_key: 'gpl',
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
            selector: 'textarea#description_ar',
            license_key: 'gpl',
            promotion: false,
            branding: false,
            height: 300,
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
            selector: 'textarea#description_so',
            height: 300,
            license_key: 'gpl',
            promotion: false,
            branding: false,
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
