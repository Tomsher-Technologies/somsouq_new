@extends('frontEnd.layouts.layout')

@section('content')
    <section class="sectiont-tutorial">
        <div class="container">
            <div class="row">

                <div class="container">
                    <h3 class="text-center mb-4">{{ __('pages.tutorial') }}</h3>
                    <div class="row">
                        @forelse($tutorials as $tutorial)
                            <div class="col-md-6">
                                <iframe width="100%" height="415" src="{{ $tutorial->youtube_link ?? "" }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                                <h4 class="py-3">{{ $tutorial->getTranslation('title', getLocaleLang()) }}</h4>
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
