@extends('backend.master')

@section('content')
<section>
    <div class="container">
        <div class="row ml-5 mt-3">
            <div class="col-md-6">

                    {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success ">

                            {{ $message }}
                    </div>
                    @endif --}}


                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Cattegory</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                <form role="form" method="POST" action="{{url('/update_category')}}">
                    @csrf
                    <div class="card-body">
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" name="category_name" value="{{$category->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                      <textarea name="desription" id="" cols="30"  class="form-control">{{$category->description}}</textarea>
                      </div>
                      <div class="form-group">

                        <input class="form-check-input ml-2 mr-2" type="checkbox" checked="" value="1" name="publication_status">
                        <span class="ml-4">Publication Status</span>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->


              </div>
        </div>
    </div>
</section>



  </div>
@endsection
