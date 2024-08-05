@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Safety Tip Information</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('safety_tip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Category<span class="required">*</span></label>
                                <select class="form-control" name="category_id">
                                    <option value="">-Select-</option>
                                    @foreach(CommonFunction::getCategory() as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>{{ $category->en_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Safety Tip (English)<span class="required">*</span></label>
                                <input type="text" placeholder="English Safety Tip" id="name_en" name="name_en" class="form-control slug_title" value="{{ old('name_en') }}">
                                @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Safety Tip (Arabic)</label>
                                <input type="text" placeholder="Arabic Safety Tip" id="name_ar" name="name_ar" class="form-control slug_title" value="{{ old('name_ar') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Safety Tip (Somali)</label>
                                <input type="text" placeholder="Somali Safety Tip" id="name_so" name="name_so" class="form-control slug_title" value="{{ old('name_so') }}">
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            <a href="{{ route('safety_tip.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
