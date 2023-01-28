@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #001f3f;">Filter ::</div>
                    <div class="card-body">
                        @foreach($filterByChildCategories as $filterchildcategory)
                        <p> 
                            <a href = "{{($filterchildcategory->childcategory->slug)??''}}">{{$filterchildcategory->childcategory->name??''}}</a>
                        </p>
                        @endforeach
                    </div>
                </div>
                <br>
                <form action = "{{url()->current()}}" method = "GET">
                        <div class = "card">
                            <div class = "card-body">
                                <div class = "form-group">
                                    <label for="">Minimum price</label>
                                    <input type = "text" name ="minPrice" class = "form-control"></input>
                                </div>
                                <div class = "form-group">
                                    <label for="">Maximum price</label>
                                    <input type = "text" name ="maxPrice" class = "form-control"></input>
                                </div>
                                <div class = "form-group">
                                    <button type = "submit" class = "btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <div class="col-md-9">
            @include('breadcrumb')
                <div class="row">
                    @forelse($advertisements as $advertisement)
                        <div class="col-3">
                        <a href="{{route('product.view',[$advertisement->id,$advertisement->slug])}}">
                        <img src="{{Storage::url($advertisement->feature_image)}}" class="img-thumbnail" style = "max-width: 100%; and height: auto;">
                            <p class="text-center  card-footer" style = "color:blue">
                                {{$advertisement->name}} for NGN{{$advertisement->price}}
                            </p>
                        </a>  
                        </div>
                    @empty
                    Sorry, we are unable to find product based on this category.
                   @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
