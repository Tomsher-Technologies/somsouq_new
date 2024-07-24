@extends('frontEnd.layouts.layout')

@section('content')
<section class="faq_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
                <div class="section_title text-center mb-3">
                    <h3>
                       {{ __('pages.faq') }}
                    </h3>
                </div>
                <p class="text-center">{{ __('pages.faq_title') }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-lg-8 m-auto">
                <div class="accordion" id="accordionExample1">
                    @forelse($helps as $help)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->iteration == 1 ? "" : "collapsed" }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $help->id }}" aria-expanded="{{ $loop->iteration == 1 ? "true" : "false" }}" aria-controls="collapse{{ $help->id }}">
                                    {{ $help->getTranslation('question', App::getLocale() ?? "en") }}
                                </button>
                            </h2>
                            <div id="collapse{{ $help->id }}" class="accordion-collapse collapse {{ $loop->iteration == 1 ? "show" : "" }}" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    <p>
                                        {{ $help->getTranslation('answer', App::getLocale() ?? "en") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontEnd.modals.login-modal')
@endsection
