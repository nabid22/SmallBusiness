@extends('admin_panel')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2 align="center">Announcement Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/save-announcement') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="announcement_title" class="col-md-4 col-form-label text-md-right">Announcement Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="announcement_title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="announcement_detail" class="col-md-4 col-form-label text-md-right">Announcement Detail</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows = "4" name="announcement_detail" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Save Announcement
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection