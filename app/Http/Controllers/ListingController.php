<?php

namespace App\Http\Controllers;

use App\Models\AdCategory;
use App\Models\Advertisement;
use App\Models\AdvertisementImages;
use App\Models\User;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function home()
    {
        $adCategories = AdCategory::all();

        $newestAds = Advertisement::latest()->limit(5)->get();

        return view('index', [
            'adCategories' => $adCategories,
            'newestAds' => $newestAds,
            'adImages' => $this->returnAllAdImages($newestAds)
        ]);
    }

    public function addListingPage()
    {
        $adCategories = AdCategory::all();

        return view('listing.add-listing', [
            'adCategories' => $adCategories
        ]);
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', 'min: 20'],
            'ad_type' => ['required'],
            'ad_category' => ['required'],
            'price' => ['required'],
            'contact_email' => ['required', 'email'],
            'contact_name' => ['required'],
            'contact_phone' => ['required'],
            'location' => ['required'],
            'description' => ['required', 'min: 50'],
            'terms_and_conditions' => ['required'],
        ]);

        $formFields['user_id'] = auth()->user()->id;
        $formFields['ad_category_id'] = $request->ad_category;
        $formFields['type'] = $request->ad_type;
        $formFields['negotiable'] = $request->negotiable ? 1 : 0;


        $ad = Advertisement::create($formFields);

        if($request->hasFile('file')) {
            $imageName = $request->file('file')->store('advertisement_images', 'public');
            AdvertisementImages::create([
                'advertisement_id' => $ad->id,
                'image' => $imageName
            ]);
        }

        return redirect('/dashboard')->with('message', 'Listing successfully added.');
    }

    public function search(Request $request)
    {
        $ads = Advertisement::latest()->filter(request(['search_term', 'search_category', 'search_location']))->paginate(2);

        return view('listing.search',[
            'ads' => $ads,
            'searchFilters' => [
                'search_term' => $request['search_term'],
                'search_category' => $request['search_category'],
                'search_location' => $request['search_location']
            ],
            'totalAds' => $ads->total(),
            'adCategories' => $this->returnAllAdCategories(),
            'adImages' => $this->returnAllAdImages($ads)
        ]);
    }

    public function detailPage($id)
    {
        $ad = Advertisement::find($id);

        return view('listing.detail', [
            'ad' => $ad,
            'adCategories' => $this->returnAllAdCategories(),
            'adImages' => AdvertisementImages::where('advertisement_id', $id)->get(),
            'user' => User::find($ad->user_id),
            'searchFilters' => [
                'search_term' => '',
                'search_category' => '',
                'search_location' => ''
            ],
        ]);
    }
}
