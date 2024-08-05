@extends('frontEnd.layouts.layout')

@section('content')
    <section class="terms-section">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section_title text-center mb-3">
                        <h3>{{ $policy->getTranslation2('title', getLocaleLang()) }}</h3>
                    </div>

                    {!! $policy->getTranslation('description', getLocaleLang()) !!}
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>
@endsection
