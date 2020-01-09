@extends('admin_panel')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2 align="center">Product Information</h2>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/update-product/'.$brand_info -> menu_id) }}" method="POST" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="food_name" class="col-md-4 col-form-label text-md-right">Brand Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="brand_name" value = "{{ $brand_info -> brand_name }}" required>
                        </div>
                    </div>
                   

                    <div class="form-group row">
                        <label for="food_price" class="col-md-4 col-form-label text-md-right">Item Price
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="item_price" value = "{{ $brand_info -> item_price }}" required>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="category_id">
                            <option value="{{ $brand_info -> category_id }}">{{ $brand_info -> category_name }}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category -> category_id}}">{{ $category -> category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="food_description" class="col-md-4 col-form-label text-md-right">
                            Item Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="item_description" required>{{ $brand_info -> item_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="food_image" class="col-md-4 col-form-label text-md-right">Item Image
                        </label>
                        <div class="col-md-8">
                        <input class="input-file uniform_on" name="item_image" id="fileInput" type="file">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Update Product
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection