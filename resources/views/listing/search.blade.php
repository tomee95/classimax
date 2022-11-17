<x-layout>
	@include('partials._search', ['adCategories' => $adCategories, 'searchFilters' => $searchFilters])
	<section class="section-sm">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-result bg-gray">
						@if($searchFilters['search_term'])
							<h2>Results For "{{ $searchFilters['search_term'] }}"</h2>
							<p>{{ $totalAds }} results returned based on your criteria.</p>
						@elseif($searchFilters['search_category'])
							<h2>Results For "{{ $adCategories[$searchFilters['search_category'] - 1]['name'] }}"</h2>
							<p>{{ $totalAds }} results returned based on your criteria.</p>
						@elseif($searchFilters['search_location'])
							<h2>Results For "{{ $searchFilters['search_location'] }}"</h2>
							<p>{{ $totalAds }} results returned based on your criteria.</p>
						@else
							<h2>All Results Listing</h2>
							<p>{{ $totalAds }} results found.</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<div class="category-sidebar">
						<div class="widget category-list">
							<h4 class="widget-header">All Categories</h4>
							<ul class="category-list">
								<li><a href="category.html">Laptops <span>93</span></a></li>
								<li><a href="category.html">Iphone <span>233</span></a></li>
								<li><a href="category.html">Microsoft  <span>183</span></a></li>
								<li><a href="category.html">Monitors <span>343</span></a></li>
							</ul>
						</div>

						<div class="widget category-list">
							<h4 class="widget-header">Nearby</h4>
							<ul class="category-list">
								<li><a href="category.html">New York <span>93</span></a></li>
								<li><a href="category.html">New Jersy <span>233</span></a></li>
								<li><a href="category.html">Florida  <span>183</span></a></li>
								<li><a href="category.html">California <span>120</span></a></li>
								<li><a href="category.html">Texas <span>40</span></a></li>
								<li><a href="category.html">Alaska <span>81</span></a></li>
							</ul>
						</div>

						<div class="widget filter">
							<h4 class="widget-header">Show Produts</h4>
							<select>
								<option>Popularity</option>
								<option value="1">Top rated</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>

						<div class="widget price-range w-100">
							<h4 class="widget-header">Price Range</h4>
							<div class="block">
								<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
									   data-slider-value="[0,5000]">
								<div class="d-flex justify-content-between mt-2">
									<span class="value">$10 - $5000</span>
								</div>
							</div>
						</div>

						<div class="widget product-shorting">
							<h4 class="widget-header">By Condition</h4>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Brand New
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Almost New
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Gently New
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Havely New
								</label>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<div class="category-search-filter">
						<div class="row">
							<div class="col-md-6 text-center text-md-left">
								<strong>Sort</strong>
								<select>
									<option>Most Recent</option>
									<option value="1">Most Popular</option>
									<option value="2">Lowest Price</option>
									<option value="4">Highest Price</option>
								</select>
							</div>
							<div class="col-md-6 text-center text-md-right mt-2 mt-md-0">
								<div class="view">
									<strong>Views</strong>
									<ul class="list-inline view-switcher">
										<li class="list-inline-item">
											<a href="#!" onclick="event.preventDefault();" class="text-info"><i class="fa fa-th-large"></i></a>
										</li>
										<li class="list-inline-item">
											<a href="../ad-list-view.html"><i class="fa fa-reorder"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="product-grid-list">
						<div class="row mt-30">
							@foreach($ads as $ad)
								<div class="col-lg-4 col-md-6">
									<!-- product card -->
									<div class="product-item bg-light">
										<div class="card">
											<div class="thumb-content">
												<!-- <div class="price">$200</div> -->
												<a href="/detail/{{ $ad->id }}">
													@if(isset($adImages[$ad->id][0]))
														<img class="card-img-top img-fluid" src="storage/{{ $adImages[$ad->id][0]->image }}" alt="Card image cap">
													@else
														<img class="card-img-top img-fluid" src="{{ asset('images/no-image.png') }}" alt="Card image cap">
													@endif

												</a>
											</div>
											<div class="card-body">
												<h4 class="card-title"><a href="/detail/{{ $ad->id }}">{{ $ad->title }}</a></h4>
												<ul class="list-inline product-meta">
													<li class="list-inline-item">
														<a href="/detail/{{ $ad->id }}"><i class="fa fa-folder-open-o"></i>{{ $adCategories[$ad->ad_category_id - 1]['name'] }}</a>
													</li>
													<li class="list-inline-item">
														<a href="/detail/{{ $ad->id }}"><i class="fa fa-calendar"></i>{{ $ad->created_at->format("M d, Y") }}</a>
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

						<div class="pagination justify-content-center">
							{{ $ads->appends([
                                    'search_term' => $searchFilters['search_term'],
                                    'search_category' => $searchFilters['search_category'],
                                    'search_location' => $searchFilters['search_location']
                                ])->links() }}
							{{--<nav aria-label="Page navigation example">--}}
							{{--<ul class="pagination">--}}
							{{--<li class="page-item">--}}
							{{--<a class="page-link" href="category.html" aria-label="Previous">--}}
							{{--<span aria-hidden="true">&laquo;</span>--}}
							{{--<span class="sr-only">Previous</span>--}}
							{{--</a>--}}
							{{--</li>--}}
							{{--<li class="page-item"><a class="page-link" href="category.html">1</a></li>--}}
							{{--<li class="page-item active"><a class="page-link" href="category.html">2</a></li>--}}
							{{--<li class="page-item"><a class="page-link" href="category.html">3</a></li>--}}
							{{--<li class="page-item">--}}
							{{--<a class="page-link" href="category.html" aria-label="Next">--}}
							{{--<span aria-hidden="true">&raquo;</span>--}}
							{{--<span class="sr-only">Next</span>--}}
							{{--</a>--}}
							{{--</li>--}}
							{{--</ul>--}}
							{{--</nav>--}}
						</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</x-layout>