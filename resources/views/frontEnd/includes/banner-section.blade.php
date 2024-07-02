<section class="banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade">
                    <div class="carousel-inner">
                        <div class="carousel-caption z-3">
                            <div class="search-box">
                                <h3 class="mb-3">What are you looking for?</h3>
                                <div class="form-inputs">
                                    <form action="{{ route('post.search') }}" method="get" id="searchFormId">
                                        @csrf
                                        <input type="search" class="form-control" placeholder="Search for items" name="search">
                                        <svg class="search_icon" width="25px" height="25px" viewBox="0 0 32 32"
                                             version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                            </defs>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd" sketch:type="MSPage">
                                                <g id="Icon-Set" sketch:type="MSLayerGroup"
                                                   transform="translate(-256.000000, -1139.000000)" fill="#000000">
                                                    <path
                                                        d="M269.46,1163.45 C263.17,1163.45 258.071,1158.44 258.071,1152.25 C258.071,1146.06 263.17,1141.04 269.46,1141.04 C275.75,1141.04 280.85,1146.06 280.85,1152.25 C280.85,1158.44 275.75,1163.45 269.46,1163.45 L269.46,1163.45 Z M287.688,1169.25 L279.429,1161.12 C281.591,1158.77 282.92,1155.67 282.92,1152.25 C282.92,1144.93 276.894,1139 269.46,1139 C262.026,1139 256,1144.93 256,1152.25 C256,1159.56 262.026,1165.49 269.46,1165.49 C272.672,1165.49 275.618,1164.38 277.932,1162.53 L286.224,1170.69 C286.629,1171.09 287.284,1171.09 287.688,1170.69 C288.093,1170.3 288.093,1169.65 287.688,1169.25 L287.688,1169.25 Z"
                                                        id="search" sketch:type="MSShapeGroup">

                                                    </path>
                                                </g>
                                            </g>
                                        </svg>

                                        <select class="form-select" aria-label="Default select example" name="category_id" required>
                                            <option value="">- Select Categories -</option>
                                            @foreach($categories as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn btn-search">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ asset('assets/frontEnd/images/banner1.jpg') }}" class="d-block w-100"
                                 alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="{{ asset('assets/frontEnd/images/logo.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/frontEnd/images/banner1.jpg') }}" class="d-block w-100"
                                 alt="...">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
