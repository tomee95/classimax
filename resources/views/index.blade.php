<x-layout>
    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Buy & Sell Near You </h1>
                        <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                        <div class="short-popular-category-list text-center">
                            <h2>Popular Categories</h2>
                            <ul class="list-inline">
                                @foreach($popularCategories as $categoryId => $adNumber)
                                    <li class="list-inline-item">
                                        <a href="/search?search_category={{ $categoryId }}"><i class="fa {{ $categoryIcons[$categoryId] }}"></i> {{ $adCategories[$categoryId - 1]['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form action="{{ url('/search') }}" method="GET">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                                <input name="search_term" type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                       placeholder="What are you looking for">
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <select name="search_category" class="w-100 form-control mt-lg-1 mt-md-2">
                                                    <option value="">Category</option>
                                                    @foreach($adCategories as $adCategory)
                                                        <option value="{{ $adCategory->id }}">{{ $adCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <input name="search_location" type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                                <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--===========================================
    =            Popular deals section            =
    ============================================-->

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Newest Ads</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        @foreach($newestAds as $ad)
                            <div class="col-sm-12 col-lg-4">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->
                                            <a href="detail/{{ $ad->id }}">
                                                @if(isset($adImages[$ad->id][0]))
                                                    <img class="card-img-top img-fluid" src="storage/{{ $adImages[$ad->id][0]->image }}" alt="Card image cap">
                                                @else
                                                    <img class="card-img-top img-fluid" src="{{ asset('images/no-image.png') }}" alt="Card image cap">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="detail/{{ $ad->id }}">{{ Str::limit($ad->title, 30) }}</a></h4>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="detail/{{ $ad->id }}"><i class="fa fa-folder-open-o"></i>{{ $adCategories[$ad->ad_category_id - 1]['name'] }}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="detail/{{ $ad->id }}"><i class="fa fa-calendar"></i>{{ $ad->created_at->format("M d, Y") }}</a>
                                                </li>
                                            </ul>
                                            <p class="card-text">{{ Str::limit($ad->description, 100) }}</p>
                                            {{--<div class="product-ratings">--}}
                                                {{--<ul class="list-inline">--}}
                                                    {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                    {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                    {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                    {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                    {{--<li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================================
    =            All Categories Section            =
    ===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
                    </div>
                    <div class="row">
                        <!-- Category list -->
                        @foreach($adCategories as $cat)
                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                                <div class="category-block">
                                    <div class="header">
                                        <i class="fa {{ $categoryIcons[$cat->id] }} icon-bg-{{ $cat->id }}"></i>
                                        <h4>{{ $cat->name }}</h4>
                                    </div>
                                    <ul class="category-list">
                                        <li><a href="#">Sub-Category 1 <span>{{ rand(50, 550) }}</span></a></li>
                                        <li><a href="#">Sub-Category 2 <span>233</span></a></li>
                                        <li><a href="#">Sub-Category 3 <span>183</span></a></li>
                                        <li><a href="#">Sub-Category 4 <span>343</span></a></li>
                                    </ul>
                                </div>
                            </div> <!-- /Category List -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--====================================
    =            Call to Action            =
    =====================================-->

    <section class="call-to-action overly bg-3 section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-md-8">
                    <div class="content-holder">
                        <h2>Start today to get more exposure and
                            grow your business</h2>
                        <ul class="list-inline mt-30">
                            <li class="list-inline-item"><a class="btn btn-main" href="{{ url('/add-listing') }}">Add Listing</a></li>
                            <li class="list-inline-item"><a class="btn btn-secondary" href="{{ url('/search') }}">Browser Listing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
</x-layout>