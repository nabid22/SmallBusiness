@extends('header')
@section('body')
  <!-- navigation menu ends here -->
  <!-- creating headin of dashboard -->
    <div class=" py-3 text-white" style="background-color: teal">
      <h1>&nbsp;&nbsp;<i class="fas fa-chart-bar"></i> Admin Panel</h1>
    </div>
    <div class="bg-light p-3">
     
    <div class="row">
       <div class="col-md-4">
         <a href="{{ URL :: to('/admin/add-announcement') }}" class="btn btn-primary d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp;ADD Announcement</a>
       </div>
       <div class="col-md-4">
         <a href="{{ URL :: to('/admin/add-category') }}" class="btn btn-success d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp; ADD CATEGORY</a>
       </div>
       <div class="col-md-4">
         <a href="{{ URL :: to('/admin/add-product') }}" class="btn btn-warning d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp;ADD product</a>
       </div>
    </div>
  </div>
  <!-- dashboard heading ends -->
  <!-- dashboaRd contet start -->
  <div class="container-fluid">
    
    <div class="row"> 
      <div class="col-8">
      @if(Session :: get('save_message'))
        <div class="alert alert-success col-md-4">
                <strong>{{ Session :: get('save_message') }}</strong>
            </div>
            <?php Session :: put('save_message',null); ?>
        @endif
        <div class="container">
        <!-- creating table -->
        @yield('content');
      </div>
    </div>
      <div class="col-md-4 mt-4">
          <div class="card">
            <div class=" bg-primary text-white p-4">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 30px; text-align: center;"><?php echo DB :: table('announcements') -> count(); ?><span class="d-block">Announcements</span></h2>
            </div>
            <div class="card-footer text-primary">
              <h6 class="text-center"><a href="{{ URL :: to('/admin/all-announcement') }}"> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
          </div>
          <div class="card mt-5">
            <div class=" bg-success text-white p-4 ">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 30px; text-align: center;"><?php echo DB :: table('categories') -> count(); ?> <span class="d-block">Categories</span></h2>
            </div>
            <div class="card-footer text-primary">
              <h6 class="text-center"><a href="{{ URL :: to('/admin/all-category') }}"> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
          </div>
          <div class="card mt-5">
            <div class=" bg-info text-white p-4 ">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 30px; text-align: center;">
              <?php
                   
                  $result =  DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->count();
                 echo $result;

              ?>
              <span class="d-block">Products</span></h2>
            </div>
            <div class="card-footer text-primary">
              <h6 class="text-center"><a href="{{ URL :: to('/admin/all-products') }}"> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
          </div>
          <div class="card mt-5">
            <div class=" bg-warning text-white p-4 ">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 30px; text-align: center;"><?php echo DB :: table('users') -> count(); ?><span class="d-block">Users</span></h2>
            </div>
            <div class="card-footer text-warning">
              <h6 class="text-center"><a href="{{ URL :: to('/admin/users') }}"> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
          </div>
      </div> 
    </div>
  
</body>

</html>
@endsection