@extends('frontEnd.layouts.layout')

@section('content')
    @foreach($abouts as $about)
        @if($about->section == 1)
            <section class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="about-content">
                                <h4>About Us</h4>
                                <h3>{{ $about->getTranslation('title', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</h3>
                                <p class="pt-2">{!! $about->getTranslation('description', \Illuminate\Support\Facades\App::getLocale() ?? 'en') !!}</p>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <img src="{{ uploaded_asset($about->image ?? "") }}" class="img-fluid rounded-3" alt="">
                        </div>
                    </div>
                </div>
            </section>

        @endif

        @if($about->section == 2)
            <section class="about-mission">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mission-content">
                                <h3>{{ $about->getTranslation('title', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</h3>
                                <p>{!! $about->getTranslation('description', \Illuminate\Support\Facades\App::getLocale() ?? 'en') !!}</p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <img src="{{ uploaded_asset($about->image ?? "") }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </section>

        @endif

        @if($about->section == 3)
            <section class="about-whychoose">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 pe-5">
                            <h3>{{ $about->getTranslation('title', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</h3>

                            <img src="{{ uploaded_asset($about->image ?? "") }}" class="img-fluid rounded-3" alt="">

                        </div>
                        <div class="col-md-8">
                            @forelse($about->AboutDescription as $data)
                                <ul>
                                    <li>
                                   <span>
                                        <div class="count">
                                          <h5>0{{$loop->iteration}}</h5>
                                        </div>
                                    </span>
                                        <span>
                                        <h4>{{ $data->getTranslation('title', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</h4>
                                        <p>{{ $data->getTranslation('description', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</p>
                                    </span>
                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>

        @endif

        @if($about->section == 4)
            <section class="about-community">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="community-inner">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>{{ $about->getTranslation('title', \Illuminate\Support\Facades\App::getLocale() ?? 'en') }}</h3>
                                        <p>{!! $about->getTranslation('description', \Illuminate\Support\Facades\App::getLocale() ?? 'en') !!}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{ uploaded_asset($about->image ?? "") }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @continue
    @endforeach

    @include('frontEnd.modals.login-modal')
@endsection
