@extends('header')
<link href="{{URL ::to('productStyle/single-product.css')}}" rel="stylesheet">
@section('body')
<div class="body">
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-end">
                    <form class="form-inline md-form mr-auto mb-4" method="POST" action="{{ url('/get-product-by-keyword') }}">
                        {{ csrf_field() }}
                        <input class="form-control mr-sm-2" type="text" placeholder="Search product" name="product_name"
                            aria-label="Search">
                        <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit">Search</button>
                    </form>
                    <div class="col-md-4 col-sm-6">
                        <div class="dropdown">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                Sort By(Asce)
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL :: to('/products-by-name-asc') }}">Name</a>
                                <a class="dropdown-item" href="{{ URL :: to('/products-by-price-asc') }}">Price</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="dropdown">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                Sort By(desc)
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL :: to('/products-by-name-desc') }}">Name</a>
                                <a class="dropdown-item" href="{{ URL :: to('/products-by-price-desc') }}">Price</a>

                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="row">
                    @foreach($products as $device)
                    <div class="col-md-3">
                        <div class="card" style="width: 15rem;">
                            <img src="{{ URL :: to($device -> item_image) }}" class="card-inside">
                            <div class="book-info">
                                <h5>{{ $device -> brand_name }}</h5>
                                <h6><span class="price">Tk. {{ $device -> item_price }}</span></h6>

                            </div>
                            <a class="btn btn-outline-success" href="{{ URL :: to('/show-product/'.$device -> menu_id) }}">View details</a>
                            <a class="btn btn-outline-warning" href=""><i class="fa fa-shopping-cart"></i>Add to
                                Cart</a>
                        </div>
                    </div>
                    <div style="margin-bottom : 520px"></div>
                    @endforeach
                </div>
                {{ $products -> links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

    </div>
</div>
@endsection