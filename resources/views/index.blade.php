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
                                <li class="list-inline-item">
                                    <a href="/search?search_category=9"><i class="fa fa-bed"></i> Real Estate</a></li>
                                {{--<li class="list-inline-item">--}}
                                    {{--<a href="listing/category.html"><i class="fa fa-grav"></i> Fitness</a>--}}
                                {{--</li>--}}
                                <li class="list-inline-item">
                                    <a href="/search?search_category=1"><i class="fa fa-car"></i> Cars</a>
                                </li>
                                {{--<li class="list-inline-item">--}}
                                    {{--<a href="listing/category.html"><i class="fa fa-cutlery"></i> Restaurants</a>--}}
                                {{--</li>--}}
                                <li class="list-inline-item">
                                    <a href="/search?search_category=3"><i class="fa fa-laptop"></i> Electronics</a>
                                </li>
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
                        {{--<div class="col-sm-12 col-lg-4">--}}
                            {{--<!-- product card -->--}}
                            {{--<div class="product-item bg-light">--}}
                                {{--<div class="card">--}}
                                    {{--<div class="thumb-content">--}}
                                        {{--<!-- <div class="price">$200</div> -->--}}
                                        {{--<a href="listing/single.html">--}}
                                            {{--<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h4 class="card-title"><a href="listing/single.html">Full Study Table Combo</a></h4>--}}
                                        {{--<ul class="list-inline product-meta">--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>--}}
                                            {{--</li>--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/category.html"><i class="fa fa-calendar"></i>26th December</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
                                        {{--<div class="product-ratings">--}}
                                            {{--<ul class="list-inline">--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                        {{--</div>--}}
                        {{--<div class="col-sm-12 col-lg-4">--}}
                            {{--<!-- product card -->--}}
                            {{--<div class="product-item bg-light">--}}
                                {{--<div class="card">--}}
                                    {{--<div class="thumb-content">--}}
                                        {{--<!-- <div class="price">$200</div> -->--}}
                                        {{--<a href="listing/single.html">--}}
                                            {{--<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h4 class="card-title"><a href="listing/single.html">11inch Macbook Air</a></h4>--}}
                                        {{--<ul class="list-inline product-meta">--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>--}}
                                            {{--</li>--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/category.html"><i class="fa fa-calendar"></i>26th December</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
                                        {{--<div class="product-ratings">--}}
                                            {{--<ul class="list-inline">--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                        {{--</div>--}}
                        {{--<div class="col-sm-12 col-lg-4">--}}
                            {{--<!-- product card -->--}}
                            {{--<div class="product-item bg-light">--}}
                                {{--<div class="card">--}}
                                    {{--<div class="thumb-content">--}}
                                        {{--<!-- <div class="price">$200</div> -->--}}
                                        {{--<a href="listing/single.html">--}}
                                            {{--<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h4 class="card-title"><a href="listing/single.html">Full Study Table Combo</a></h4>--}}
                                        {{--<ul class="list-inline product-meta">--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>--}}
                                            {{--</li>--}}
                                            {{--<li class="list-inline-item">--}}
                                                {{--<a href="listing/category.html"><i class="fa fa-calendar"></i>26th December</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
                                        {{--<div class="product-ratings">--}}
                                            {{--<ul class="list-inline">--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
                                                {{--<li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                        {{--</div>--}}
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
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-laptop icon-bg-1"></i>
                                    <h4>Electronics</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Laptops <span>93</span></a></li>
                                    <li><a href="listing/category.html">Iphone <span>233</span></a></li>
                                    <li><a href="listing/category.html">Microsoft <span>183</span></a></li>
                                    <li><a href="listing/category.html">Monitors <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-apple icon-bg-2"></i>
                                    <h4>Restaurants</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Cafe <span>393</span></a></li>
                                    <li><a href="listing/category.html">Fast food <span>23</span></a></li>
                                    <li><a href="listing/category.html">Restaurants <span>13</span></a></li>
                                    <li><a href="listing/category.html">Food Track<span>43</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-home icon-bg-3"></i>
                                    <h4>Real Estate</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Farms <span>93</span></a></li>
                                    <li><a href="listing/category.html">Gym <span>23</span></a></li>
                                    <li><a href="listing/category.html">Hospitals <span>83</span></a></li>
                                    <li><a href="listing/category.html">Parolurs <span>33</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-shopping-basket icon-bg-4"></i>
                                    <h4>Shoppings</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Mens Wears <span>53</span></a></li>
                                    <li><a href="listing/category.html">Accessories <span>212</span></a></li>
                                    <li><a href="listing/category.html">Kids Wears <span>133</span></a></li>
                                    <li><a href="listing/category.html">It & Software <span>143</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-briefcase icon-bg-5"></i>
                                    <h4>Jobs</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">It Jobs <span>93</span></a></li>
                                    <li><a href="listing/category.html">Cleaning & Washing <span>233</span></a></li>
                                    <li><a href="listing/category.html">Management <span>183</span></a></li>
                                    <li><a href="listing/category.html">Voluntary Works <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-car icon-bg-6"></i>
                                    <h4>Vehicles</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Bus <span>193</span></a></li>
                                    <li><a href="listing/category.html">Cars <span>23</span></a></li>
                                    <li><a href="listing/category.html">Motobike <span>33</span></a></li>
                                    <li><a href="listing/category.html">Rent a car <span>73</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-paw icon-bg-7"></i>
                                    <h4>Pets</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Cats <span>65</span></a></li>
                                    <li><a href="listing/category.html">Dogs <span>23</span></a></li>
                                    <li><a href="listing/category.html">Birds <span>113</span></a></li>
                                    <li><a href="listing/category.html">Others <span>43</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">

                                <div class="header">
                                    <i class="fa fa-laptop icon-bg-8"></i>
                                    <h4>Services</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="listing/category.html">Cleaning <span>93</span></a></li>
                                    <li><a href="listing/category.html">Car Washing <span>233</span></a></li>
                                    <li><a href="listing/category.html">Clothing <span>183</span></a></li>
                                    <li><a href="listing/category.html">Business <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->


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