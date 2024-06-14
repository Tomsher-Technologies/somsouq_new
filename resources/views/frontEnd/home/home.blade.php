@extends('frontEnd.layouts.layout')

@section('content')
    @include('frontEnd.includes.banner-section')
    @include('frontEnd.includes.top-categories')

    @include('frontEnd.includes.add-section')

    <section class="popular-ads-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Ads</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="product-details.html">
                        <div class="card ad-card">
                            <div class="card-img-warpper">
                                <img src="{{ asset('assets/frontEnd/images/popular-ads-img-1.jpg') }}" class="card-img-top"
                                     alt="...">
                                <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Asokoro</span>
                                <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-price">SOS 120,000,000 </h5>
                                <h4 class="card-title">Land Rover Range Rover Sport SE Td6 4x4 2020 Black</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="{{ asset('assets/frontEnd/images/popular-ads-img-2.png') }}" class="card-img-top"
                                 alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Ikoyi</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3,500,000,000</h5>
                            <h4 class="card-title">Furnished 6bdrm Duplex in Banana Island for Sale</h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-3.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Magodo</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 400,000 </h5>
                            <h4 class="card-title">Brand New Epson 4200 Lumens Projector </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-4.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Ojo</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 500,000</h5>
                            <h4 class="card-title">Creative Luxury Modern Italian Round Centre Table </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-5.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>   Lagos, Ikeja</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 103,000 </h5>
                            <h4 class="card-title">Anker Soundcore Select Pro With Free Anker Gift </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-6.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Lagos Island (Eko)</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 30,000</h5>
                            <h4 class="card-title">
                                Longness Chain Wrist Watch With Dawn Seconds Engine
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-7.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ikeja</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">DJI Osmo Pocket 3 Creator Combo Action Camera</h4>
                            <h5 class="card-price">SOS 1,200,000</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-ads-img-8.png" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Ikeja</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Smart Watch T55 Pro Max Series 7 With Earbud Extra</h4>
                            <h5 class="card-price"> SOS 14,000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')


    <section class="popular-properties-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Properties for Rent</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Galadimawa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">Furnished 2bdrm Shared Apartment in Galadimawa for rent </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Delta, Oshimili South </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <h5 class="card-price">SOS 3492</h5>
                                2bdrm Block of Flats in Asaba, Oshimili South for rent
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Jiwa, Idu </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">3bdrm Duplex in By Nizamiye Turkish, Idu for rent</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Jahi </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">Furnished 2bdrm Shared Apartment in Galadimawa for rent </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Kubwa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Furnished 2bdrm Block of Flats in Fo1, Kubwa for rent
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Maitama </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">Furnished 4bdrm Townhouse / Terrace in Maitama for rent</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Abuja, Gwarinpa, Life Camp </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">4bdrm Townhouse / Terrace in River Park Estate, Life Camp for rent</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_rent8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Abuja, Galadimawa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <h5 class="card-price">SOS 3492</h5>
                                5bdrm Duplex in Suncity Estate, Galadimawa for rent
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')


    <section class="popular-properties-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Properties for Sale</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Galadimawa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                4bdrm Townhouse/Terrace in By Nizamiya, Idu for sale
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Delta, Oshimili South </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">

                                3bdrm House in New Bodija Estate, Ibadan for sale

                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Jiwa, Idu </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">

                                Furnished 5bdrm Duplex in Magodo Phase 1 for sale

                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Jahi </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">


                                Furnished 5bdrm Duplex in Lekki County Homes for sale


                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Kubwa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">


                                Furnished 4bdrm Duplex in Medina, Gbagada for Sale


                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Maitama </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">

                                Furnished 4bdrm Duplex in 2Nd Tollgate, Lekki, for sale

                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Abuja, Gwarinpa, Life Camp </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">

                                4bdrm Duplex in Lakeview Estate, Amuwo-Odofin for sale

                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/properties_sale8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Abuja, Galadimawa </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                5bdrm Duplex in Thomas Estate, Lekki Phase 2 for Sale
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Vehicles for Rent</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-cars-img-1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Lekki </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Land Rover Range Rover Autobiography SWB 2021 Black
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lughaye</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                BMW 7 Series 2011 Black
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Banaadir</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Mercedes-Benz GLE-Class AMG GLE 43 4MATIC 2018 White
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Jubbada Hoose</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Acura MDX SUV 4dr AWD (3.7 6cyl 5A) 2009 Silver
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Woqooyi Galbeed</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Volkswagen Transporter 2003 White
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Shabeellaha Hoose</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Double Drum Roller Machine Professional 2020
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Jubbada Dhexe</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                3tons, 4tons,5tons Forklift Eagle Power
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_rent7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Shabeellaha Dhexe</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Sonlink SL200-8A 2019 Orange
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Vehicles for Sale</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Lekki </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">Land Rover Range Rover Autobiography SWB 2021 Black</h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Lagos, Lekki </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                New Toyota HiAce 2023 White
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Foreign Used Caterpillar Dumper 740.
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Alimosho </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                New Qlink XP 200 2022 Black
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                80tons Lowbed With Mack Head.
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Ford F-150 SuperCrew 2008 Black
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Mercedes-Benz M Class ML 350 4Matic 2007 White
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/vehicles_sale8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Land Rover Range Rover Sport 2008 Black
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Fashion Items</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Ibeju </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Make Up Box
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Location, location</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Laptop Bags
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Mogadishu </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Black Fashion Bag
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Kismaayo</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Gucci Luxury Backpack
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Hargeysa</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Mont Blanc Laptop Bag
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Baidoa</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Brand New Universal Luggage(By4)
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Gaalkacyo</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Mont Blanc Laptop Bag
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/fashion_items8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Marka</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Gucci Luxury Backpack
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-electronics-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Electronics</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Boosaaso</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Viltrox Dc-70 Ii Camera Monitor
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Garoowe</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Laptop Lenovo ThinkPad P50 8GB Intel Core I7 SSD 512GB
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Burco</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                65 Inch Lg Smart Tv Uhd4k, With Hdmi, Netflix, Youtube
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Buurhakaba</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Microkingdom Desktop Michoacan
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i>  Lagos, Lagos Island (Eko) </span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                GAMING Keyboard With Led Light / Backlight / Keyboard Light
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Jawhar</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                500gb Seagate External Hard Drive
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Xuddur</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                HP P27V G4 FHD Monitor
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-electronic-8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Afgooye</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Cat Wireless Headset - Durable Headphone
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')

    <section class="popular-electronics-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Health & Beauty Items</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-1.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Beledweyne</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Pure Egyptian Magic Whitening Body Set
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-2.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Qoryooley</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">

                                Perfume Oils at Per Dozen

                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-3.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Garbahaarrey</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Head Mannequin With Hair
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-4.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Hobyo</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Make -Up and Cosmetic Box
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-5.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Laasqoray</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Arthritis, Rheumatism And Body Pain Oil
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-6.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Dhuusamarreeb</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Original Complet Set of First Aid Box
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-health-7.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Boorama</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Digital Acupuncture Slimming/Massaging/ Stroke Machine
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card ad-card">
                        <div class="card-img-warpper">
                            <img src="assets/images/popular-Health-8.jpg" class="card-img-top" alt="...">
                            <span class="card-location"><i class="bi bi-geo-alt"></i> Laascaanood</span>
                            <a href="#" class="wishlist-icon"><i class="bi bi-heart"></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-price">SOS 3492</h5>
                            <h4 class="card-title">
                                Faforon Salud Herbal to Unblock Tissues and Dissolve Tumor
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
