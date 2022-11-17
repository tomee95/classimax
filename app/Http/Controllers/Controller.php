<?php

namespace App\Http\Controllers;

use App\Models\AdCategory;
use App\Models\AdvertisementImages;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnAllAdCategories()
    {
        return AdCategory::all();
    }

    public function returnAllAdImages($ads)
    {
        $adImages = [];
        foreach ($ads as $ad) {
            $adImages[$ad->id] = AdvertisementImages::where('advertisement_id', $ad->id)->get();
        }

        return $adImages;
    }
}
