@extends('admin.layouts.app')
@section('header')
    <style>
        section.ad-details {
            background-color: #f4f5f4;
            padding: 60px 0;
        }
        section.ad-details .product-detail-title {
            margin-top: 20px;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        section.ad-details .product-detail-title h3 {
            font-size: 35px;
            font-weight: 600;
        }
        section.ad-details p {
            font-size: 15px;
            font-weight: 300;
            margin-bottom: 30px;
        }
        section.ad-details h5 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        section.ad-details .ad-views ul {
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin: 0;
        }
        section.ad-details .ad-views ul li {
            list-style: none;
            font-size: 16px;
            font-weight: 300;
            position: relative;
            padding-right: 50px;
            border: 1px solid #e8e7e7;
            border-radius: 6px;
            padding: 10px 20px;
            width: 100%;
        }
        section.ad-details .ad-views ul li::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 1px;
            background-color: #f2f2f2;
        }
        section.ad-details .ad-detail-spec ul {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-basis: 50%;
        }
        section.ad-details .ad-detail-spec ul li {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #f2f2f2;
            padding: 15px 30px;
            margin-bottom: 20px;
            border-radius: 50px;
            flex-basis: 50%;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <section class="ad-details">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-8 m-auto">

                    <div class="card border-0 p-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="card-top-right">
                                    @if($post->sub_category_id != 19)
                                        <span>Price: {{ $post->price ?? "" }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="product-detail-title m-0">
                                <h3>{{ $post->getTranslation('title', 'en') }}</h3>
                            </div>
                            <h5 class="pt-2"><i class="bi bi-geo-alt me-1"></i>{{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</h5>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="card border-0 p-3">
                        <div class="card-body">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    @foreach($images as $key => $image)
                                        <li data-target="#demo" data-slide-to="{{ $key }}" class="active"></li>
                                    @endforeach
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    @forelse($images as $image)
                                        <div class="carousel-item {{ $loop->iteration == 1 ? "active" : "" }}">
{{--                                            <img src="la.jpg" alt="Los Angeles" width="1100" height="500">--}}
                                            <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" alt="{{ $image->file_original_name }}" width="1000" height="400" s>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    <h4 class="mb-2">{{ __('post.specifications') }}</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            <div class="ad-detail-spec">
                                <ul>
                                    <li><span>Status</span> <span>{{ ucfirst($post->status) }}</span> </li>
                                    <li><span>Reference no.</span> <span>{{ $post->tracking_number }}</li>
                                </ul>
                            </div>
                            {!! $postDetailHtml !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    <h4 class="mb-2">{{ __('post.description') }}</h4>
                    <div class="card p-3 border-0">
                        <div class="card-body">
                            {{ $post->getTranslation('description', App::getLocale() ?? "en") }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8 m-auto">
                    <a href="{{ route('post.list') }}" class="btn btn-warning">Go back</a>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">

    </script>
@endsection
