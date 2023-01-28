<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Advertisement;

class MenuController extends Controller
{
    public function menu(){
        //$category = Category::where('name','property')->first();
        //$firstAds = Advertisement::where('category_id',$category->id)
        //->orderByDesc('id')->take(4)->get();

        //$secondAds = Advertisement::where('category_id',$category->id)
        //->whereNotIn('id',$firstAds->pluck('id')->toArray())
        //->take(4)->get();
    
    //return view('index',compact('firstAds','secondAds','category'));
    }
}
