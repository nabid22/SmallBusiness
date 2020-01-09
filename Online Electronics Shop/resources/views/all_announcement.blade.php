@extends('header')
@section('body')
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="container">
                <!-- creating table -->
                <table class="table table-dark table-striped">
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
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_announcements as $announcement)
                        <tr>
                            <td>{{ $announcement ->announcement_title }}</td>
                            <td>{{ $announcement ->announcement_detail }}</td>
                            <td>{{ $announcement -> publication_date }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $all_announcements -> links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
    </div>
    @endsection