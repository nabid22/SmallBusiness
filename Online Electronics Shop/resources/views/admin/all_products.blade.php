@extends('admin_panel')
@section('content')
<table class="table mt-4">
    <thead class="table-dark">
        <tr>
            <th>
              Brand Name
            </th>
          
            <th>
               Item Price
            </th>
            <th>
               Item Description
            </th>
            <th>
               Item Image
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_brands as $brand)
        <tr>
            <td>{{ $brand ->brand_name }}</td>
            <td>{{ $brand ->item_price }}</td>
            <td>{{ $brand ->item_description }}</td>
            
            <td><img src="{{ URL :: to($brand ->item_image) }}" style="width : 80px; height : 80px;">
            </td>
            <td>
                <a class="btn btn-danger" href="{{URL :: to('/admin/delete-product/'.$brand ->menu_id)}}">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <a href="{{URL :: to('/admin/edit-product/'.$brand ->menu_id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
            
        </tr>
        
        @endforeach
       
    </tbody>
</table>
        {{ $all_brands->links('vendor.pagination.bootstrap-4') }}
@endsection