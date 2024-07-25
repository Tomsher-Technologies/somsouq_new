@extends('frontEnd.layouts.layout')

@section('content')
    <section class="sectiont-sell-buy">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <h3>{{ __('pages.how_to_sell_and_buy') }}</h3>
                    <div class="card">
                        <div class="card-body">
                            @forelse($data as $key => $value)
                                <h4>{{ __('pages.content_type.' . $key) }}</h4>
                                @forelse($value as $title)
                                    <h5>{{ $title->priority }}. {{ $title->getTranslation('title', getLocaleLang()) }}</h5>
                                    {!! $title->getTranslation('description', getLocaleLang()) !!}
                                @empty
                                @endforelse
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection
