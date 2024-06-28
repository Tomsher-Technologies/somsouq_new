@extends('frontEnd.layouts.layout')

@section('stylesheet')
    <style>
        .owl-item {height: 0;}
        .owl-item.active {height: auto;}
    </style>
@endsection
@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class=" ad-details">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-8 m-auto">

                    <div class="card border-0 p-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <span class="bg_primary rounded-5 text-white px-3 py-2"> {{ ucfirst($post->status) ?? "" }}</span>
                                <div class="card-top-right">
                                    <span>Price: {{ $post->price ?? "" }}</span>
                                </div>
                            </div>

                            <div class="product-detail-title m-0">
                                <h3>{{ $post->title ?? "" }}</h3>
                            </div>
                            <h5 class="pt-2"><i class="bi bi-geo-alt me-1"></i>{{ $post->state }}, {{ $post->city }}</h5>
                        </div>
                    </div>

                </div>
            </div>



            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="card border-0 p-3">
                        <div class="card-body">
                            <div id="sync1" class="owl-carousel owl-theme">
                                @forelse($images as $image)
                                    <div class="item">
                                        <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" alt="{{ $image->file_original_name }}">
                                    </div>
                                @empty
                                @endforelse
                            </div>

                            <div id="sync2" class="owl-carousel owl-theme">
                                @forelse($images as $image)
                                    <div class="item">
                                        <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" alt="{{ $image->file_original_name }}">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    <h4 class="mb-2">Specifications</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            {!! $postDetailHtml !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    <h4 class="mb-2">Description</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            <p class="mb-0">{{ $post->description ?? "" }}</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
