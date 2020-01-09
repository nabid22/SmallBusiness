@extends('admin_panel')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2 align="center">Category Information</h2>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/update-category/'.$category -> category_id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="category_name" value = "{{ $category -> category_name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_description" class="col-md-4 col-form-label text-md-right">Category Description</label>
                        <div class="col-md-7">
                            <textarea class="form-control" rows = "4" name="category_description" required>{{ $category -> category_description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Update Category
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection