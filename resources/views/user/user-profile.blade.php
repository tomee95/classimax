<x-layout>
	<section class="user-profile section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="sidebar">
						<!-- User Widget -->
						<div class="widget user">
							<!-- User Image -->
							<div class="image d-flex justify-content-center">
								@if(auth()->user()->profile_picture)
									<img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="" class="">
								@else
									<img src="{{ asset('images/user/no-user-image-thumb.png') }}" alt="" class="">
								@endif
							</div>
							<!-- User Name -->
							@if(auth()->user()->firstname and auth()->user()->lastname)
								<h5 class="text-center">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h5>
							@else
								<h5 class="text-center">{{ auth()->user()->email }}</h5>
							@endif
						</div>
						<!-- Dashboard Links -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li><a href="{{ url('/') }}">Savings Dashboard</a></li>
								<li><a href="{{ url('/') }}">Saved Offer <span>(5)</span></a></li>
								<li><a href="{{ url('/') }}">Favourite Stores <span>(3)</span></a></li>
								<li><a href="{{ url('/') }}">Recommended</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<!-- Edit Profile Welcome Text -->
					<div class="widget welcome-message">
						<h2>My Profile</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					</div>
					<!-- Edit Personal Info -->
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="widget personal-info">
								<h3 class="widget-header user">Edit Personal Information</h3>
								<form action="/users/my-profile/{{ auth()->user()->id }}}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<!-- Email -->
										<div class="form-group">
											<label for="email">Email</label>
											<input name="email" type="text" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly>
											@error('email')
											<p class="p-1 bg-danger text-white">{{ $message }}</p>
											@enderror
										</div>
									<!-- Phone -->
									<div class="form-group">
										<label for="phone">Phone number</label>
										<input name="phone" type="text" class="form-control" id="phone" value="{{ auth()->user()->phone }}">
										@error('phone')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- First Name -->
									<div class="form-group">
										<label for="first-name">First Name</label>
										<input name="firstname" type="text" class="form-control" id="first-name" value="{{ auth()->user()->firstname }}">
										@error('firstname')
											<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- Last Name -->
									<div class="form-group">
										<label for="last-name">Last Name</label>
										<input name="lastname" type="text" class="form-control" id="last-name" value="{{ auth()->user()->lastname }}">
										@error('lastname')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- File chooser -->
									<div class="form-group choose-file d-inline-flex">
										<i class="fa fa-user text-center px-3"></i>
										<input name="profile_picture" type="file" class="form-control-file mt-2 pt-1" id="input-file">
									</div>
									<!-- Country -->
									<div class="form-group">
										<label for="country">Country</label>
										<input name="country" type="text" class="form-control" id="country" value="{{ auth()->user()->country }}">
										@error('country')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- County -->
									<div class="form-group">
										<label for="county">County</label>
										<input name="county" type="text" class="form-control" id="county" value="{{ auth()->user()->county }}">
										@error('county')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- City -->
									<div class="form-group">
										<label for="city">City</label>
										<input name="city" type="text" class="form-control" id="city" value="{{ auth()->user()->city }}">
										@error('city')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- Zip Code -->
									<div class="form-group">
										<label for="zip-code">Zip Code</label>
										<input name="zip_code" type="text" class="form-control" id="zip-code" value="{{ auth()->user()->zip_code }}">
										@error('zip_code')
										<p class="p-1 bg-danger text-white">{{ $message }}</p>
										@enderror
									</div>
									<!-- Submit button -->
									<button class="btn btn-transparent">Save My Changes</button>
								</form>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<!-- Change Password -->
							<div class="widget change-password">
								<h3 class="widget-header user">Edit Password</h3>
								<form action="/users/my-profile/password_change/{{ auth()->user()->id }}" method="POST">
									@csrf
									@method('PUT')
									<!-- Current Password -->
									<div class="form-group">
										<label for="current-password">Current Password</label>
										<input name="current_password" type="password" class="form-control" id="current-password">
									</div>
									@error('current_password')
									<p class="p-1 bg-danger text-white">{{ $message }}</p>
									@enderror
									<!-- New Password -->
									<div class="form-group">
										<label for="new-password">New Password</label>
										<input name="new_password" type="password" class="form-control" id="new-password">
									</div>
									@error('new_password')
									<p class="p-1 bg-danger text-white">{{ $message }}</p>
									@enderror
									<!-- Confirm New Password -->
									<div class="form-group">
										<label for="confirm-password">Confirm New Password</label>
										<input name="new_password_confirmation" type="password" class="form-control" id="confirm-password">
									</div>
									@error('new_password_confirmation')
									<p class="p-1 bg-danger text-white">{{ $message }}</p>
									@enderror
									<!-- Submit Button -->
									<button class="btn btn-transparent">Change Password</button>
								</form>
							</div>
						</div>
						{{--<div class="col-lg-6 col-md-6">--}}
							{{--<!-- Change Email Address -->--}}
							{{--<div class="widget change-email mb-0">--}}
								{{--<h3 class="widget-header user">Edit Email Address</h3>--}}
								{{--<form action="#">--}}
									{{--<!-- Current Password -->--}}
									{{--<div class="form-group">--}}
										{{--<label for="current-email">Current Email</label>--}}
										{{--<input type="email" class="form-control" id="current-email">--}}
									{{--</div>--}}
									{{--<!-- New email -->--}}
									{{--<div class="form-group">--}}
										{{--<label for="new-email">New email</label>--}}
										{{--<input type="email" class="form-control" id="new-email">--}}
									{{--</div>--}}
									{{--<!-- Submit Button -->--}}
									{{--<button class="btn btn-transparent">Change email</button>--}}
								{{--</form>--}}
							{{--</div>--}}
						{{--</div>--}}
					</div>
				</div>
			</div>
		</div>
	</section>
</x-layout>