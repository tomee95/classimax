<x-layout>
    <section class="advt-post bg-gray py-5">
        <div class="container">
            <form action="{{ url('/add-listing/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary px-3 px-md-4 py-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Ad Title:</h6>
                            <input name="title" type="text" class="form-control bg-white" placeholder="Title of the Ad" required value="{{ old('title') }}">
                            @error('title')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                            <h6 class="font-weight-bold pt-4 pb-1">Ad Type:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 pt-2 pb-1 rounded bg-white">
                                    <input type="radio" name="ad_type" value="1" id="personal" required>
                                    <label for="personal" class="py-2">Personal</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 pt-2 pb-1 rounded bg-white ">
                                    <input type="radio" name="ad_type" value="2" id="business" required>
                                    <label for="business" class="py-2">Business</label>
                                </div>
                            </div>
                            @error('ad_type')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="" class="form-control bg-white" rows="7"
                                      placeholder="Write details about your product" required>{{ old('description') }}</textarea>
                            @error('description')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                            <select name="ad_category" class="form-control w-100 bg-white" id="inputGroupSelect">
                                <option value="">Select an ad category</option>
                                @foreach($adCategories as $adCategory)
                                    <option value="{{ $adCategory->id }}"
                                    @if($adCategory->id == old('ad_category'))
                                        selected
                                    @endif
                                        >{{ $adCategory->name }}</option>
                                @endforeach
                            </select>
                            @error('ad_category')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price (€ EUR):</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 rounded my-2 px-0">
                                        <input type="text" name="price" class="form-control bg-white" placeholder="Price" id="price" value="{{ old('price') }}">
                                        @error('price')
                                        <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 ml-lg-4 my-2 pt-2 pb-1 rounded bg-white ">
                                        <input type="checkbox" name="negotiable" value="1" id="Negotiable">
                                        <label for="Negotiable" class="py-2">Negotiable</label>
                                        @error('negotiable')
                                        <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded bg-white">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" class="form-control-file d-none" id="file-upload" name="file">
                                    @error('file')
                                    <p class="p-1 bg-danger text-white">{{ $message }}</p>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- seller-information start -->
                <fieldset class="border px-3 px-md-4 py-4 my-5 seller-information bg-gray">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Seller Information</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input name="contact_name" type="text" placeholder="Contact name" class="form-control bg-white" required value="{{ old('contact_name') }}"
                                @if(auth()->user()->firstname and auth()->user()->lastname)
                                    value="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}"
                                @endif
                            >
                            @error('contact_name')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Phone Number:</h6>
                            <input name="contact_phone" type="text" placeholder="Contact Phone Number" class="form-control bg-white" required value="{{ old('contact_phone') }}"
                                @if(auth()->user()->phone)
                                    value="{{ auth()->user()->phone }}"
                                @endif
                            >
                            @error('contact_phone')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Email:</h6>
                            <input name="contact_email" type="email" placeholder="name@yourmail.com" class="form-control bg-white" required value="{{ old('contact_email') }}"
                                @if(auth()->user()->email)
                                    value="{{ auth()->user()->email }}"
                                @endif
                            >
                            @error('contact_email')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                            <h6 class="font-weight-bold pt-4 pb-1">Location:</h6>
                            <input name="location" type="text" placeholder="Your address" class="form-control bg-white" required value="{{ old('location') }}"
                                @if(auth()->user()->city and auth()->user()->county and auth()->user()->country)
                                    value="{{ auth()->user()->city }}, {{ auth()->user()->county }}, {{ auth()->user()->country }}"
                                @endif
                            >
                            @error('location')
                            <p class="p-1 bg-danger text-white">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <!-- seller-information end-->

                <!-- ad-feature start -->
                {{--<fieldset class="border bg-white px-3 px-md-4 py-4 my-5 ad-feature bg-gray">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12">--}}

                            {{--<h3 class="pb-3">Make Your Ad Featured--}}
                                {{--<span class="float-right font-weight-normal text-success" data-toggle="tooltip" data-placement="top" title="Autem, architecto quisquam distinctio totam aut voluptatibus placeat ut nobis molestias rerum!">What is featured ad ?</span>--}}
                            {{--</h3>--}}

                        {{--</div>--}}
                        {{--<div class="col-lg-6 my-3">--}}
                            {{--<span class="mb-3 d-block">Premium Ad Options:</span>--}}
                            {{--<ul>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="regular-ad" name="adfeature">--}}
                                    {{--<label for="regular-ad" class="font-weight-bold text-dark py-1">Regular Ad</label>--}}
                                    {{--<span>$00.00</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="Featured-Ads" name="adfeature">--}}
                                    {{--<label for="Featured-Ads" class="font-weight-bold text-dark py-1">Top Featured--}}
                                        {{--Ads</label>--}}
                                    {{--<span>$59.00</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="urgent-Ads" name="adfeature">--}}
                                    {{--<label for="urgent-Ads" class="font-weight-bold text-dark py-1">Urgent Ads</label>--}}
                                    {{--<span>$79.00</span>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6 my-3">--}}
                            {{--<span class="mb-3 d-block">Please select the preferred payment method:</span>--}}
                            {{--<ul>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="bank-transfer" name="adfeature">--}}
                                    {{--<label for="bank-transfer" class="font-weight-bold text-dark py-1">Direct Bank--}}
                                        {{--Transfer</label>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="Cheque-Payment" name="adfeature">--}}
                                    {{--<label for="Cheque-Payment" class="font-weight-bold text-dark py-1">Cheque--}}
                                        {{--Payment</label>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<input type="radio" id="Credit-Card" name="adfeature">--}}
                                    {{--<label for="Credit-Card" class="font-weight-bold text-dark py-1">Credit Card</label>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</fieldset>--}}
                <!-- ad-feature start -->

                <!-- submit button -->
                <div class="checkbox d-inline-flex">
                    <input name="terms_and_conditions" type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success" href="../terms-condition.html">Terms & Condition and Posting
              Rules.</a></span>
                    </label>
                </div>
                @error('terms_and_conditions')
                <p class="p-1 bg-danger text-white">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
        </div>
    </section>
</x-layout>