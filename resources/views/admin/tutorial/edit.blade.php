@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Update Tutorial Information</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('tutorial.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $tutorial->id }}">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Title (English)<span class="required">*</span></label>
                                <input type="text" placeholder="English Title" id="title_en" name="title_en" class="form-control slug_title" value="{{ $tutorial->getTranslation('title', 'en') }}">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Title (Arabic)</label>
                                <input type="text" placeholder="Arabic Title" id="title_ar" name="title_ar" class="form-control slug_title" value="{{ $tutorial->getTranslation('title', 'ar') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Title (Somali)</label>
                                <input type="text" placeholder="Somali Title" id="title_so" name="title_so" class="form-control slug_title" value="{{ $tutorial->getTranslation('title', 'so') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Embed Youtube Video <span class="required">*</span></label>
                                <input type="text" placeholder="Embed Youtube Video" id="youtube_link" name="youtube_link" class="form-control slug_title" value="{{ $tutorial->youtube_link ?? "" }}">
                                @error('youtube_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">Status</label>
                            <div class="col-md-12">
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ ($tutorial->is_active == 1) ? 'selected' : '' }} value="1">
                                        Active
                                    </option>
                                    <option {{ ($tutorial->is_active == 0) ? 'selected' : '' }} value="0">
                                        Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            <a href="{{ route('tutorial.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
