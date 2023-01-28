@extends('layouts.app')
@section('content')
<div class = "container">
@include('breadcrumb')
<div class = "container" style = "color:white; background-color:#001f3f"><i><h5>{{$advertisements->count()}} results found for your search criteria in Nigeria</h5></i></div>
<div class = "row">
            @foreach($advertisements as $advertisement)
                <div class = "col-3">
                    <a href = "{{route('product.view',[$advertisement->id,$advertisement->slug])}}">
                    <img src = "{{Storage::url($advertisement->feature_image)}}" class = "img-thumnail" style = "max-width: 100%; and height: auto;">                       
                    <p class = "text-left card-footer" style = "color:blue">
                    {{$advertisement->name}} @ NGN{{$advertisement->price}}
                    </p>
                    </a>
                </div>
            @endforeach
    </div>
</div>
@endsection