@extends('layouts.app')

@section('content')
<div type = "slider" style = "margin-top:-25px;">
    <div id = "carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/slider/slider1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider3.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
<div class = "container mt-10">
    <div class = "row text-center mt-10">
    <h3>All categories</h3>
        <div class="row text-center mt-15">
            @foreach ($categories as $category)
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" id="card">
                        <div class="card-body">
                            <a href="{{ route('category.show', $category->slug) }}" class="d-block mb-4 h-100">
                                <img class="img-thumbnail" src="{{ Storage::url($category->image) }}"
                                style=" height: 100px; background-size: cover;">
                                <p class="">{{ $category->name }}</p>
                            </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-10; mb-10">
        <span>
            <a href="{{route('category.show',$category->slug)}}"><h3>Property</h3></a>
            <a href="{{route('category.show',$category->slug)}}" class="float-right">View all</a>
        </span>
        <br>
        <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @forelse($firstAds as $firstad)
                        <div class="col-3">
                            <a href = "{{route('product.view',[$firstad->id,$firstad->slug])}}">
                            <img src="{{Storage::url($firstad->feature_image)}}" 
                            class="img-thumbnail" style = "max-width: 100%; and height: auto;">
                            <p class="text-left  card-footer" style="color: blue;">
                                {{$firstad->name}} @ NGN{{$firstad->price}}
                            </a>
                            </p>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class = "carousel-item">
                    <div class = "row">
                    @forelse($secondAds as $secondad)
                        <div class = "col-3">
                        <a href = "{{route('product.view',[$firstad->id,$firstad->slug])}}">
                            <img src = "{{Storage::url($secondad->feature_image)}}" style = "max-width: 100%; and height: auto;">
                        
                            <p class = "text-left card-footer" style = "color:blue">
                            {{$secondad->name}} @ NGN{{$secondad->price}}
                            </p>
                        </a>
                        </div>
                    @empty
                    @endforelse
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container mt-10;mb-10">
        <span>
            <a href="{{route('category.show',$categoryVehicles->slug)}}"><h3>Vehicles</h3></a>
            <a href="{{route('category.show',$categoryVehicles->slug)}}" class="float-right">View all</a>
        </span>
        <br>
        <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @forelse($firstAdsForVehicles as $firstAdsForVehicle)
                        <div class="col-3">
                            <a href = "{{route('product.view',[$firstAdsForVehicle->id,$firstAdsForVehicle->slug])}}">
                            <img src="{{Storage::url($firstAdsForVehicle->feature_image)}}" 
                            class="img-thumbnail" style = "max-width: 100%; and height: auto;">
                            <p class="text-left  card-footer" style="color: blue;">
                                {{$firstAdsForVehicle->name}} @ NGN{{$firstAdsForVehicle->price}}
                            </a>
                            </p>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class = "carousel-item">
                    <div class = "row">
                    @forelse($secondAdsForVehicles as $secondAdsForVehicle)
                        <div class = "col-3">
                        <a href = "{{route('product.view',[$secondAdsForVehicle->id,$secondAdsForVehicle->slug])}}">
                            <img src = "{{Storage::url($secondad->feature_image)}}" class = "img-thumnail" style = "max-width: 100%; and height: auto;">
                        
                            <p class = "text-left card-footer" style = "color:blue">
                            {{$secondAdsForVehicle->name}} @ NGN{{$secondAdsForVehicle->price}}
                            </p>
                        </a>
                        </div>
                    @empty
                    @endforelse
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

@endsection


