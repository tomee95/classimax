<x-layout>
	@include('partials._search', ['adCategories' => $adCategories])
	<!--===================================
    =            Store Section            =
    ====================================-->
	<section class="section bg-gray">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<!-- Left sidebar -->
				<div class="col-lg-8">
					<div class="product-details">
						<h1 class="product-title">{{ $ad->title }}</h1>
						<div class="product-meta">
							<ul class="list-inline">
								<li class="list-inline-item"><i class="fa fa-user-o"></i> By
									@if($user->firstname and $user->lastname)
										{{ $user->firstname }} {{ $user->lastname }}
									@else
										{{ $user->email }}
									@endif
								</li>
								<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="listing/category.html">{{ $adCategories[$ad->ad_category_id - 1]['name'] }}</a></li>
								<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="listing/category.html">{{ $ad->location }}</a></li>
							</ul>
						</div>

						<!-- product slider -->
						<div class="product-slider">
							@if(isset($adImages[0]))
								<div class="product-slider-item my-4" data-image="storage/{{ $adImages[0]->image }}">
									<img class="img-fluid w-100" src="/storage/{{ $adImages[0]->image }}" alt="product-img">
								</div>
							@else
								<div class="product-slider-item my-4" data-image="{{ asset('images/no-image.png') }}">
									<img class="img-fluid w-100" src="{{ asset('images/no-image.png') }}" alt="product-img">
								</div>
							@endif

							{{--<div class="product-slider-item my-4" data-image="images/products/products-2.jpg">--}}
								{{--<img class="d-block img-fluid w-100" src="images/products/products-2.jpg" alt="Second slide">--}}
							{{--</div>--}}
							{{--<div class="product-slider-item my-4" data-image="images/products/products-3.jpg">--}}
								{{--<img class="d-block img-fluid w-100" src="images/products/products-3.jpg" alt="Third slide">--}}
							{{--</div>--}}
							{{--<div class="product-slider-item my-4" data-image="images/products/products-1.jpg">--}}
								{{--<img class="d-block img-fluid w-100" src="images/products/products-1.jpg" alt="Third slide">--}}
							{{--</div>--}}
							{{--<div class="product-slider-item my-4" data-image="images/products/products-2.jpg">--}}
								{{--<img class="d-block img-fluid w-100" src="images/products/products-2.jpg" alt="Third slide">--}}
							{{--</div>--}}
						</div>
						<!-- product slider -->

						<div class="content mt-5 pt-5">
							<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
									   aria-selected="true">Product Details</a>
								</li>
								{{--<li class="nav-item">--}}
									{{--<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"--}}
									   {{--aria-selected="false">Specifications</a>--}}
								{{--</li>--}}
								{{--<li class="nav-item">--}}
									{{--<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"--}}
									   {{--aria-selected="false">Reviews</a>--}}
								{{--</li>--}}
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<h3 class="tab-title">Product Description</h3>
									<p>{{ $ad->description }}</p>

								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<h3 class="tab-title">Product Specifications</h3>
									<table class="table table-bordered product-table">
										<tbody>
										<tr>
											<td>Seller Price</td>
											<td>$450</td>
										</tr>
										<tr>
											<td>Added</td>
											<td>26th December</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Brand</td>
											<td>Apple</td>
										</tr>
										<tr>
											<td>Condition</td>
											<td>Used</td>
										</tr>
										<tr>
											<td>Model</td>
											<td>2017</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Battery Life</td>
											<td>23</td>
										</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
									<h3 class="tab-title">Product Review</h3>
									<div class="product-review">
										<div class="media">
											<!-- Avater -->
											<img src="images/user/user-thumb.jpg" alt="avater">
											<div class="media-body">
												<!-- Ratings -->
												<div class="ratings">
													<ul class="list-inline">
														<li class="list-inline-item">
															<i class="fa fa-star"></i>
														</li>
														<li class="list-inline-item">
															<i class="fa fa-star"></i>
														</li>
														<li class="list-inline-item">
															<i class="fa fa-star"></i>
														</li>
														<li class="list-inline-item">
															<i class="fa fa-star"></i>
														</li>
														<li class="list-inline-item">
															<i class="fa fa-star"></i>
														</li>
													</ul>
												</div>
												<div class="name">
													<h5>Jessica Brown</h5>
												</div>
												<div class="date">
													<p>Mar 20, 2018</p>
												</div>
												<div class="review-comment">
													<p>
														Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
														riamipsa eaque.
													</p>
												</div>
											</div>
										</div>
										<div class="review-submission">
											<h3 class="tab-title">Submit your review</h3>
											<!-- Rate -->
											<div class="rate">
												<div class="starrr"></div>
											</div>
											<div class="review-submit">
												<form action="#" method="POST" class="row">
													<div class="col-lg-6 mb-3">
														<input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
													</div>
													<div class="col-lg-6 mb-3">
														<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
													</div>
													<div class="col-12 mb-3">
														<textarea name="review" id="review" rows="6" class="form-control" placeholder="Message" required></textarea>
													</div>
													<div class="col-12">
														<button type="submit" class="btn btn-main">Sumbit</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar">
						<div class="widget price text-center">
							<h4>Price</h4>
							<p>{{ $ad->price }} €</p>
						</div>
						<!-- User Profile widget -->
						<div class="widget user text-center">
							@if($user->profile_picture)
								<img class="rounded-circle img-fluid mb-5 px-5" src="{{ asset('storage/' . $user->profile_picture) }}" alt="">
							@else
								<img class="rounded-circle img-fluid mb-5 px-5" src="{{ asset('images/user/no-user-image-thumb.png') }}" alt="">
							@endif

							@if($user->firstname and $user->lastname)
								<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
							@else
								<h4 class="text-center">{{ $user->email }}</h4>
							@endif
							<p class="member-time">Member Since {{ $user->created_at->format("M d, Y") }}</p>
							<a href="#">See all ads</a>
							<ul class="list-inline mt-20">
								<li class="list-inline-item"><a href="../contact-us.html" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
								<li class="list-inline-item"><a href="single.html" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
										offer</a></li>
							</ul>
						</div>
						{{--<!-- Map Widget -->--}}
						{{--<div class="widget map">--}}
							{{--<div class="map">--}}
								{{--<div id="map" data-latitude="51.507351" data-longitude="-0.127758"></div>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- Rate Widget -->--}}
						{{--<div class="widget rate">--}}
							{{--<!-- Heading -->--}}
							{{--<h5 class="widget-header text-center">What would you rate--}}
								{{--<br>--}}
								{{--this product</h5>--}}
							{{--<!-- Rate -->--}}
							{{--<div class="starrr"></div>--}}
						{{--</div>--}}
						{{--<!-- Safety tips widget -->--}}
						{{--<div class="widget disclaimer">--}}
							{{--<h5 class="widget-header">Safety Tips</h5>--}}
							{{--<ul>--}}
								{{--<li>Meet seller at a public place</li>--}}
								{{--<li>Check the item before you buy</li>--}}
								{{--<li>Pay only after collecting the item</li>--}}
								{{--<li>Pay only after collecting the item</li>--}}
							{{--</ul>--}}
						{{--</div>--}}
						{{--<!-- Coupon Widget -->--}}
						{{--<div class="widget coupon text-center">--}}
							{{--<!-- Coupon description -->--}}
							{{--<p>Have a great product to post ? Share it with--}}
								{{--your fellow users.--}}
							{{--</p>--}}
							{{--<!-- Submii button -->--}}
							{{--<a href="single.html" class="btn btn-transparent-white">Submit Listing</a>--}}
						{{--</div>--}}

					</div>
				</div>

			</div>
		</div>
		<!-- Container End -->
	</section>
</x-layout>