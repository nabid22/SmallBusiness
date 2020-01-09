@extends('admin_panel')
@section('content')
<table class="table mt-3">
    <thead class="table-dark">
        <tr>
            <th>
                Category Id
            </th>
            <th>
                Category Name
            </th>
            <th>
                Category Description
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_category as $category)
        <tr>
            <td>{{ $category -> category_id }}</td>
            <td>{{ $category -> category_name }}</td>
            <td>{{ $category -> category_description }}</td>
            <td>
                <a class="btn btn-danger" href="{{URL :: to('/admin/delete-category/'.$category -> category_id)}}">
                <i class="fas fa-trash-alt"></i>
                </a>
                <a href="{{URL :: to('/admin/edit-category/'.$category -> category_id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
      {{ $all_category -> links('vendor.pagination.bootstrap-4') }}
@endsection