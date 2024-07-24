@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('City Information')}}</h5>
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

              <form class="p-4" action="{{ route('cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input name="_method" type="hidden" value="PATCH">

                  <div class="tab-content" id="nav-tabContent">
                      {{--                        english--}}
                      <div class="tab-pane fade  show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                          <div class="form-group mb-3">
                              <label for="name">{{ translate('Name') }}</label>
                              <input type="text" placeholder="{{ translate('Name') }}" value="{{ $city->getTranslation('name', 'en') }}" name="name_en" class="form-control" required>

                              @if($errors->has('name_en'))
                                  <span class="text-danger">{{ $errors->first('name_en') }}</span>
                              @endif
                          </div>

                          <div class="form-group">
                              <label for="state_id">{{translate('State')}}</label>
                              <select class="select2 form-control aiz-selectpicker" name="state_id" data-selected="{{ $city->state_id }}" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                  @foreach ($states as $state)
                                      <option value="{{ $state->id }}">{{ $state->getTranslation('name', 'en') }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      {{--                        english--}}

                      {{--                        arabic--}}
                      <div class="tab-pane fade" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">
                          <div class="form-group mb-3">
                              <label for="name">{{ translate('Name') }}</label>
                              <input type="text" placeholder="{{ translate('Name') }}" value="{{ $city->getTranslation('name', 'ar') }}" name="name_ar" class="form-control">
                          </div>

                          <div class="form-group">
                              <label for="state_id">{{translate('State')}}</label>
                              <select class="select2 form-control aiz-selectpicker" name="state_id" data-selected="{{ $city->state_id }}" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                  @foreach ($states as $state)
                                      <option value="{{ $state->id }}">{{ $state->getTranslation('name', 'en') }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      {{--                        arabic--}}

                      {{--                        somali--}}
                      <div class="tab-pane fade" id="nav-so" role="tabpanel" aria-labelledby="nav-so-tab">

                          <div class="form-group mb-3">
                              <label for="name">{{ translate('Name') }}</label>
                              <input type="text" placeholder="{{ translate('Name') }}" value="{{ $city->getTranslation('name', 'so') }}" name="name_so" class="form-control">
                          </div>

                          <div class="form-group">
                              <label for="state_id">{{translate('State')}}</label>
                              <select class="select2 form-control aiz-selectpicker" name="state_id" data-selected="{{ $city->state_id }}" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                  @foreach ($states as $state)
                                      <option value="{{ $state->id }}">{{ $state->getTranslation('name', 'en') }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      {{--                        somali--}}

                      <div class="form-group mb-3 text-right">
                          <button type="submit" class="btn btn-sm btn-primary">Save</button>
                          <a href="{{ route('cities.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                      </div>

                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection
