@extends('admin_panel')
@section('content')
<table class="table mt-3">
    <thead class="table-dark">
        <tr>
            <th>
                Announcement Title
            </th>
            <th>
                Announcement Detail
            </th>
            <th>
                Publication Date
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_announcements as $announcement)
        <tr>
            <td>{{ $announcement ->announcement_title }}</td>
            <td>{{ $announcement ->announcement_detail }}</td>
            <td>{{ $announcement -> publication_date }}</td>
            <td>
                <a class="btn btn-danger" href="{{URL :: to('/admin/delete-announcement/'.$announcement -> announce_id)}}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
   {{ $all_announcements -> links('vendor.pagination.bootstrap-4') }}
@endsection