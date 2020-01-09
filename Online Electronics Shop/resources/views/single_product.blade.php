@extends('header')
<link href="{{URL ::to('productStyle/single-product.css')}}" rel="stylesheet">
@section('body')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card img">
                <img src="{{ URL :: to($device -> item_image) }}" class="alignment">
            </div>
        </div>
        <div class="col-md-6 align">
            <h4 class="book-name">{{ $device -> brand_name }}</h4>
            <h5>Category : <span class="category">{{ $device -> category_name }}</span></h5>
            <h5>Price : <span class="bolder">Tk. {{ $device -> item_price }}</span></h5>
            <a class="btn btn-outline-success" href="#">Buy Now</a>
            <a class="btn btn-outline-warning" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <h3>Related items</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($related_items as $item)
                <div class="col-md-3">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ URL :: to($item -> item_image) }}" class="card-inside">
                        <div class="card-body">
                            <h5>{{ $item -> brand_name }}</h5>
                            <h6><span class="price">Tk. {{ $item -> item_price }}</span></h6>
                            <a class="btn btn-outline-success" href="{{ URL :: to('/show-product/'.$item -> menu_id) }}">View details</a>
                            <a class="btn btn-outline-warning" href=""><i class="fa fa-shopping-cart"></i>Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </div>

</div>

@endsection