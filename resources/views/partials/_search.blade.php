<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="advance-search nice-select-white">
                    <form action="{{ url('/search') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                <input name="search_term" type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for" value="{{ $searchFilters['search_term'] }}">
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <select name="search_category" class="w-100 form-control my-2 my-lg-0">
                                    <option value="">Category</option>
                                    @foreach($adCategories as $adCategory)
                                        <option value="{{ $adCategory->id }}"
                                            @if($adCategory->id == $searchFilters['search_category'])
                                                selected
                                            @endif
                                        >{{ $adCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <input name="search_location" type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location" value="{{ $searchFilters['search_location'] }}">
                            </div>
                            <div class="form-group col-xl-2 col-lg-3 col-md-6">

                                <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>