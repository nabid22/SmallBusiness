@extends('admin_panel')
@section('content')
<table class="table mt-3">
    <thead class="table-dark">
        <tr>
            <th>
                User Id
            </th>
            <th>
                Email Address
            </th>
            <th>
               Mailing Address
            </th>
            <th>
                User Name 
            </th>
           
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user -> user_id }}</td>
            
            <td>{{ $user -> email_address }}</td>
            <td>{{ $user -> mailing_address }}</td>
            <td>{{ $user -> user_name }}</td>
            
            <td>
                <a class="btn btn-danger" href="{{URL :: to('/admin/delete-user/'.$user -> user_id)}}">
                <i class="fas fa-trash-alt"></i>
                </a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
      {{ $users -> links('vendor.pagination.bootstrap-4') }}
@endsection