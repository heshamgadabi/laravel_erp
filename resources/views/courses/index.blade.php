@extends('Main_layout')

@section('title')
Courses Admin
@endsection

@section('content')
<!-- Main content -->       

<div class="content">
    <div class="container-fluid">



      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Courses Data 
                  <a href="{{ route('courses.create') }}" class="btn btn-primary float-right">Add New Course</a>
                
                </h3>
                
                @if(session('success'))
                  <div class="clearfix"></div>
                  
                  <div class="alert alert-success mt-2">
                    {{ session('success') }}
                  </div>
                @endif

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Update</th>
                      <th>Created</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($courses as $course)

                    <tr>
                      <td>{{ $course->id }}</td>
                      <td>{{ $course->name }}</td>
                      <td>{{ $course->active ? 'Active' : 'Inactive' }}</td>
                      <td>{{ $course->updated_at }}</td>
                      <td>{{ $course->created_at }}</td>
                    </tr>
                  @endforeach
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->


    </div>

      


    </div>
</div>
    <!-- /.content -->    

@endsection


@section('breadcrumb')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Courses Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Courses Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection