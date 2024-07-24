@extends('frontEnd.layouts.layout')

@section('content')
    <section class="terms-section">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    @forelse($policies as $policy)
                        <h2>{{ $policy->priority }}. {{ $policy->getTranslation('title', App::getLocale() ?? "en") }}</h2>
                        {!! $policy->getTranslation('description', App::getLocale() ?? "en") !!}
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection
