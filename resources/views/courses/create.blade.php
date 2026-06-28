@extends('Main_layout')

@section('title')
Courses Create
@endsection







@section('breadcrumb')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Courses Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Courses Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->
@endsection




@section('content')


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-2">
          </div>

          <div class="col-md-8">
             


                      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Course Form</h3>
              </div>

              @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif

              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                  <!--div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="active" value="1">
                    <label class="form-check-label" for="exampleCheck1">Check Active</label>
                  </div-->
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="active">
                      <option value="">Select Status</option>
                      <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Inactive</option>
                      <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Active</option>
                      
                    </select>
                    @error('active')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                    @error('photo')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>



                   
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          


        
          </div>

        </div>


      </div>


        
      </div>
    </section>

    <!-- /.content -->




@endsection