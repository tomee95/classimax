<x-layout>
  <!--==================================
=            User Profile            =
===================================-->
  <section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <!-- Row Start -->
      <div class="row">
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- User Widget -->
            <div class="widget user-dashboard-profile">
              <!-- User Image -->
              <div class="profile-thumb">
                @if(auth()->user()->profile_picture)
                  <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="" class="rounded-circle">
                @else
                  <img src="{{ asset('images/user/no-user-image-thumb.png') }}" alt="" class="rounded-circle">
                @endif
                {{--<img src="images/user/user-thumb.jpg" alt="" class="rounded-circle">--}}
              </div>
              <!-- User Name -->
              @if(auth()->user()->firstname and auth()->user()->lastname)
                <h5 class="text-center">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h5>
              @else
                <h5 class="text-center">{{ auth()->user()->email }}</h5>
              @endif
              <p>Joined {{ auth()->user()->created_at->format("M d, Y") }}</p>
              <a href="{{ url('/my-profile') }}" class="btn btn-main-sm">Edit Profile</a>
            </div>
            <!-- Dashboard Links -->
            <div class="widget user-dashboard-menu">
              <ul>
                <li class="active"><a href="../dashboard-my-ads.html"><i class="fa fa-user"></i> My Ads</a></li>
                <li><a href="../dashboard-favourite-ads.html"><i class="fa fa-bookmark-o"></i> Favourite Ads
                    <span>5</span></a></li>
                <li><a href="../dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archived Ads
                    <span>12</span></a></li>
                <li><a href="../dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
                </li>
                <li><a href="#!" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete Account</a></li>
              </ul>
            </div>

            <!-- delete-account modal -->
            <!-- delete account popup modal start-->
            <!-- Modal -->
            <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">
                    <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                    <h6 class="py-2">Are you sure you want to delete your account?</h6>
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                    <textarea class="form-control" name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                  </div>
                  <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete account popup modal end-->
            <!-- delete-account modal -->

          </div>
        </div>
        <div class="col-lg-8">
          <!-- Recently Favorited -->
          <div class="widget dashboard-container my-adslist">
            <h3 class="widget-header">My Ads</h3>
            <table class="table table-responsive product-dashboard-table">
              <thead>
              <tr>
                <th>Image</th>
                <th>Product Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($ads as $ad)
                <tr>
                  <td class="product-thumb">
                    @if(isset($adImages[$ad->id][0]))
                      <img width="80px" height="auto" src="storage/{{ $adImages[$ad->id][0]->image }}" alt="image description">
                    @else
                      <img width="80px" height="auto" src="{{ asset('images/no-image.png') }}" alt="image description">
                    @endif
                  </td>
                  <td class="product-details">
                    <h3 class="title">{{ $ad->title }}</h3>
                    <span class="add-id"><strong>Ad ID:</strong> {{ $ad->id }}</span>
                    <span><strong>Posted on: </strong><time>{{ $ad->created_at->format("M d, Y") }}</time> </span>
                    <span class="status active"><strong>Status</strong>Active</span>
                    <span class="location"><strong>Location</strong>{{ $ad->location }}</span>
                  </td>
                  <td class="product-category"><span class="categories">{{ $adCategories[$ad->ad_category_id - 1]['name'] }}</span></td>
                  <td class="action" data-title="Action">
                    <div class="">
                      <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">
                          <a data-toggle="tooltip" data-placement="top" title="view" class="view" href="category.html">
                            <i class="fa fa-eye"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="dashboard.html">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
              {{--<tr>--}}

                {{--<td class="product-thumb">--}}
                  {{--<img width="80px" height="auto" src="images/products/products-2.jpg" alt="image description"></td>--}}
                {{--<td class="product-details">--}}
                  {{--<h3 class="title">Study Table Combo</h3>--}}
                  {{--<span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>--}}
                  {{--<span><strong>Posted on: </strong><time>Feb 12, 2017</time> </span>--}}
                  {{--<span class="status active"><strong>Status</strong>Active</span>--}}
                  {{--<span class="location"><strong>Location</strong>USA</span>--}}
                {{--</td>--}}
                {{--<td class="product-category"><span class="categories">Laptops</span></td>--}}
                {{--<td class="action" data-title="Action">--}}
                  {{--<div class="">--}}
                    {{--<ul class="list-inline justify-content-center">--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="../category.html">--}}
                          {{--<i class="fa fa-eye"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="dashboard.html">--}}
                          {{--<i class="fa fa-pencil"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">--}}
                          {{--<i class="fa fa-trash"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                    {{--</ul>--}}
                  {{--</div>--}}
                {{--</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}
                {{--<td class="product-thumb">--}}
                  {{--<img width="80px" height="auto" src="images/products/products-3.jpg" alt="image description"></td>--}}
                {{--<td class="product-details">--}}
                  {{--<h3 class="title">Macbook Pro 15inch</h3>--}}
                  {{--<span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>--}}
                  {{--<span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>--}}
                  {{--<span class="status active"><strong>Status</strong>Active</span>--}}
                  {{--<span class="location"><strong>Location</strong>Dhaka,Bangladesh</span>--}}
                {{--</td>--}}
                {{--<td class="product-category"><span class="categories">Laptops</span></td>--}}
                {{--<td class="action" data-title="Action">--}}
                  {{--<div class="">--}}
                    {{--<ul class="list-inline justify-content-center">--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="../category.html">--}}
                          {{--<i class="fa fa-eye"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="dashboard.html">--}}
                          {{--<i class="fa fa-pencil"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">--}}
                          {{--<i class="fa fa-trash"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                    {{--</ul>--}}
                  {{--</div>--}}
                {{--</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}

                {{--<td class="product-thumb">--}}
                  {{--<img width="80px" height="auto" src="images/products/products-4.jpg" alt="image description"></td>--}}
                {{--<td class="product-details">--}}
                  {{--<h3 class="title">Macbook Pro 15inch</h3>--}}
                  {{--<span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>--}}
                  {{--<span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>--}}
                  {{--<span class="status active"><strong>Status</strong>Active</span>--}}
                  {{--<span class="location"><strong>Location</strong>Dhaka,Bangladesh</span>--}}
                {{--</td>--}}
                {{--<td class="product-category"><span class="categories">Laptops</span></td>--}}
                {{--<td class="action" data-title="Action">--}}
                  {{--<div class="">--}}
                    {{--<ul class="list-inline justify-content-center">--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="../category.html">--}}
                          {{--<i class="fa fa-eye"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="dashboard.html">--}}
                          {{--<i class="fa fa-pencil"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">--}}
                          {{--<i class="fa fa-trash"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                    {{--</ul>--}}
                  {{--</div>--}}
                {{--</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}

                {{--<td class="product-thumb">--}}
                  {{--<img width="80px" height="auto" src="images/products/products-1.jpg" alt="image description"></td>--}}
                {{--<td class="product-details">--}}
                  {{--<h3 class="title">Macbook Pro 15inch</h3>--}}
                  {{--<span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>--}}
                  {{--<span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>--}}
                  {{--<span class="status active"><strong>Status</strong>Active</span>--}}
                  {{--<span class="location"><strong>Location</strong>Dhaka,Bangladesh</span>--}}
                {{--</td>--}}
                {{--<td class="product-category"><span class="categories">Laptops</span></td>--}}
                {{--<td class="action" data-title="Action">--}}
                  {{--<div class="">--}}
                    {{--<ul class="list-inline justify-content-center">--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a href="../category.html" data-toggle="tooltip" data-placement="top" title="View" class="view">--}}
                          {{--<i class="fa fa-eye"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="dashboard.html">--}}
                          {{--<i class="fa fa-pencil"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                      {{--<li class="list-inline-item">--}}
                        {{--<a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">--}}
                          {{--<i class="fa fa-trash"></i>--}}
                        {{--</a>--}}
                      {{--</li>--}}
                    {{--</ul>--}}
                  {{--</div>--}}
                {{--</td>--}}
              {{--</tr>--}}
              </tbody>
            </table>

          </div>

          <!-- pagination -->

          <div class="pagination justify-content-center">
            {{ $ads->links() }}
            {{--<nav aria-label="Page navigation example">--}}

              {{--<ul class="pagination">--}}
                {{--<li class="page-item">--}}
                  {{--<a class="page-link" href="dashboard.html" aria-label="Previous">--}}
                    {{--<span aria-hidden="true">&laquo;</span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                  {{--</a>--}}
                {{--</li>--}}
                {{--<li class="page-item"><a class="page-link" href="dashboard.html">1</a></li>--}}
                {{--<li class="page-item active"><a class="page-link" href="dashboard.html">2</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="dashboard.html">3</a></li>--}}
                {{--<li class="page-item">--}}
                  {{--<a class="page-link" href="dashboard.html" aria-label="Next">--}}
                    {{--<span aria-hidden="true">&raquo;</span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                  {{--</a>--}}
                {{--</li>--}}
              {{--</ul>--}}
            {{--</nav>--}}
          </div>
          <!-- pagination -->

        </div>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </section>
</x-layout>