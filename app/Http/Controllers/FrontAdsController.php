<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;

class FrontAdsController extends Controller
{
    public function index()
    {
        //for category property
        $category = Category::CategoryProperty();
        $firstAds = Advertisement::firstFourAdsInCaurosel($category->id);
        $secondAds = Advertisement::secondFourAdsInCaurosel($category->id);
        //for category vehicles
        $categoryVehicles = Category::CategoryVehicles();
        $firstAdsForVehicles = Advertisement::firstFourAdsInCauroselForVehicles(
            $categoryVehicles->id
        );

        //get all categories
        $categories = Category::get();
        $secondAdsForVehicles = Advertisement::secondFourAdsInCauroselForVehicles(
            $categoryVehicles->id
        );


        return view('index',compact(
            'firstAds',
            'secondAds',
            'category',
            'categoryVehicles',
            'firstAdsForVehicles',
            'secondAdsForVehicles',
            'categories'
        ));
    }
}
