@extends('frontEnd.layouts.layout')

@section('content')
    <section class="terms-section">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    @forelse($conditions as $condition)
                        <h2>{{ $condition->priority }}. {{ $condition->getTranslation('title', App::getLocale() ?? "en") }}</h2>
                        {!! $condition->getTranslation('description', App::getLocale() ?? "en") !!}
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection
