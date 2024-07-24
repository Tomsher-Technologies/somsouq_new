@extends('admin.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">Update Color Information</h5>
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

                    <form class="p-4" action="{{ route('color.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="color_id" value="{{ $color->id }}">
                        <div class="tab-content" id="nav-tabContent">
                            {{--                        english--}}
                            <div class="tab-pane fade  show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Color Name</label>
                                    <input type="text" placeholder="Enter color name" value="{{ $color->getTranslation('name', 'en') }}" name="name_en" class="form-control">

                                    @if($errors->has('name_en'))
                                        <span class="text-danger">{{ $errors->first('name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--                        english--}}

                            {{--                        arabic--}}
                            <div class="tab-pane fade" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Color Name</label>
                                    <input type="text" placeholder="Enter color name" value="{{ $color->getTranslation('name', 'ar') }}" name="name_ar" class="form-control">
                                </div>
                            </div>
                            {{--                        arabic--}}

                            {{--                        somali--}}
                            <div class="tab-pane fade" id="nav-so" role="tabpanel" aria-labelledby="nav-so-tab">
                                <div class="form-group mb-3">
                                    <label for="name">Color Name</label>
                                    <input type="text" placeholder="Enter color name" value="{{ $color->getTranslation('name', 'so') }}" name="name_so" class="form-control">
                                </div>
                            </div>
                            {{--                        somali--}}

                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{{ route('color.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
