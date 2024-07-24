@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Edit About Us {{ $lang }}</h5>
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            @foreach ($languages as $key => $language)
                                <a class="nav-link @if ($language->app_lang_code == $lang) active @else bg-soft-dark border-light border-left-0 @endif" id="nav-{{ $language->app_lang_code }}-tab" data-toggle="tab" href="#nav-{{ $language->app_lang_code }}" role="tab" aria-controls="nav-{{ $language->app_lang_code }}" aria-selected="true" onclick="changeLang('{{ $language->app_lang_code }}')">
                                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                                    <span>{{ $language->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </nav>

                    <form class="form-horizontal" action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $about->id }}">
                        <input type="hidden" name="lang" id="lang_id" value="{{ $lang }}">

                        <div class="tab-content" id="nav-tabContent">
                            {{--                        english--}}
                            <div class="tab-pane fade  {{ ($lang == 'en') ? "show active" : "" }}" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Section<span class="required">*</span></label>
                                        <select class="form-control" name="section" disabled>
                                            @foreach($section as $key => $value )
                                                <option value="{{ $key }}" @selected($key == $about->section ?? "")>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Title<span class="required">*</span></label>
                                        <input type="text" placeholder="Title" id="title" name="title_en" class="form-control" value="{{ $about->getTranslation('title', 'en') }}">
                                    </div>
                                </div>

                                @if($about->description_type == 2)
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="30%">Title</th>
                                                <th>Description</th>
                                                <th width="15%">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($descriptions))
                                                @foreach($descriptions as $key => $data)
                                                    <input type="hidden" name="ids[]" value="{{ $data->id }}"/>
                                                    <tr>
                                                        <td><input type="text" class="form-control" placeholder="Title" name="multi_title_en[]" value="{!! $data->getTranslation('title', 'en') !!}"></td>
                                                        <td>
                                                        <textarea class="form-control" name="multi_description_en[]">
                                                            {!! $data->getTranslation('description', 'en') !!}
                                                        </textarea>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="multi_status_en[]">
                                                                <option value="1" {{ ($data->is_active == 1) ? 'selected': "" }}>Active</option>
                                                                <option value="0" {{ ($data->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Description<span class="required">*</span></label>
                                            <textarea class="form-control" id="full-featured" name="description_en">
                                                {{ $about->getTranslation('description', 'en')}}
                                            </textarea>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label class="col-form-label">Image</label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                    Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="image" class="selected-files" value="{{ $about->image ?? "" }}">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ ($about->is_active == 1) ? 'selected': "" }}>Active</option>
                                            <option value="0" {{ ($about->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    <a href="{{ route('about.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                                </div>
                            </div>
                            {{--                        english--}}

                            {{--                        arabic--}}
                            <div class="tab-pane fade {{ ($lang == 'ar') ? "show active" : "" }}" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Section<span class="required">*</span></label>
                                        <select class="form-control" name="section" disabled>
                                            @foreach($section as $key => $value )
                                                <option value="{{ $key }}" @selected($key == $about->section ?? "")>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Title<span class="required">*</span></label>
                                        <input type="text" placeholder="Title" id="title" name="title_ar" class="form-control" value="{{ $about->getTranslation('title', 'ar') }}">
                                    </div>
                                </div>

                                @if($about->description_type == 2)
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="30%">Title</th>
                                                <th>Description</th>
                                                <th width="15%">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($descriptions))
                                                @foreach($descriptions as $key => $data)
                                                    <input type="hidden" name="ids[]" value="{{ $data->id }}"/>
                                                    <tr>
                                                        <td><input type="text" class="form-control" placeholder="Title" name="multi_title_ar[]" value="{!! $data->getTranslation('title', 'ar') !!}"></td>
                                                        <td>
                                                <textarea class="form-control" name="multi_description_ar[]">
                                                    {!! $data->getTranslation('description', 'ar') !!}
                                                </textarea>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="multi_status_ar[]">
                                                                <option value="1" {{ ($data->is_active == 1) ? 'selected': "" }}>Active</option>
                                                                <option value="0" {{ ($data->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Description<span class="required">*</span></label>
                                            <textarea class="form-control" id="full-featured" name="description_ar">
                                                {{ $about->getTranslation('description', 'ar') }}
                                            </textarea>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label class="col-form-label">Image</label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                    Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="image" class="selected-files" value="{{ $about->image ?? "" }}">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ ($about->is_active == 1) ? 'selected': "" }}>Active</option>
                                            <option value="0" {{ ($about->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    <a href="{{ route('about.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                                </div>
                            </div>
                            {{--                        arabic--}}

                            {{--                        somali--}}
                            <div class="tab-pane fade {{ ($lang == 'so') ? "show active" : "" }}" id="nav-so" role="tabpanel" aria-labelledby="nav-so-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Section<span class="required">*</span></label>
                                        <select class="form-control" name="section" disabled>
                                            @foreach($section as $key => $value )
                                                <option value="{{ $key }}" @selected($key == $about->section ?? "")>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Title<span class="required">*</span></label>
                                        <input type="text" placeholder="Title" id="title" name="title_so" class="form-control" value="{{ $about->getTranslation('title', 'so') }}">
                                    </div>
                                </div>

                                @if($about->description_type == 2)
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="30%">Title</th>
                                                <th>Description</th>
                                                <th width="15%">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($descriptions))
                                                @foreach($descriptions as $key => $data)
                                                    <input type="hidden" name="ids[]" value="{{ $data->id }}"/>
                                                    <tr>
                                                        <td><input type="text" class="form-control" placeholder="Title" name="multi_title_so[]" value="{!! $data->getTranslation('title', 'so') !!}"></td>
                                                        <td>
                                                <textarea class="form-control" name="multi_description_so[]">
                                                    {!! $data->getTranslation('description', 'so') !!}

                                                </textarea>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="multi_status_so[]">
                                                                <option value="1" {{ ($data->is_active == 1) ? 'selected': "" }}>Active</option>
                                                                <option value="0" {{ ($data->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Description<span class="required">*</span></label>
                                            <textarea class="form-control" id="full-featured" name="description_so">
                                                {{ $about->getTranslation('description', 'so')}}
                                            </textarea>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label class="col-form-label">Image</label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                    Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="image" class="selected-files" value="{{ $about->image ?? "" }}">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ ($about->is_active == 1) ? 'selected': "" }}>Active</option>
                                            <option value="0" {{ ($about->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    <a href="{{ route('about.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                                </div>
                            </div>
                            {{--                        somali--}}

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
            selector: 'textarea#full-featured',
            license_key: 'gpl',
            promotion: false,
            branding: false,
            height: 500,
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

        function changeLang(lang)
        {
            $('#lang_id').val(lang);

            window.location.href = "{{ route('about.edit', ['about'=>$about->id, 'lang'=> ""]) }}" + lang;
        }
    </script>
@endsection
