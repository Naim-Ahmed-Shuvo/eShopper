@extends('backend.master')

@section('content')
  <section>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                           <div class="header_content d-flex justify-content-between">
                               <h5>All Products</h5>
                               <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#productModal">Add<i class="fas fa-plus ml-1"></i></button>
                           </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped" id="product_table">
                            <thead>
                              <tr>
                                <th scope="col">Image</th>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Short Des</th>
                                <th scope="col">Long Des</th>
                                <th scope="col">Price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $products = DB::table('products')->get();
                                @endphp

                                @foreach ($products as $index=>$item)
                                <tr>
                                  <th scope="row"><img src="{{url($item->image)}}" height="50" width="60" alt=""></th>

                                   <td>{{$index+1}}</td>
                                   <td>{{$item->name}}</td>
                                   <td>{{$item->category_id}}</td>
                                   <td>{{$item->brand_id}}</td>
                                   <td>{{$item->short_description}}</td>
                                   <td>{{$item->long_description}}</td>
                                   <td>{{$item->price}}</td>
                                   <td>{{$item->size}}</td>
                                   <td>{{$item->color}}</td>
                                   <td>
                                    @if ($item->publication_status == 1)
                                    <span class="label label-success bg-success p-1" >Active</span>
                                    @else
                                    <span class="label label-warning bg-danger p-1">Inactive</span>
                                    @endif
                                   </td>
                                   <td>
                                    @if ($item->publication_status == 1)
                                        <a href="{{url('/de_active_product')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="far fa-thumbs-up"></i></a>
                                    @else
                                        <a href="{{url('/active_product')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i></a>
                                    @endif

                                    <a href="{{url('/edit_product')}}/{{$item->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('/delete_product')}}/{{$item->id}}"   id="delete_product" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                          </table>
                      </div>
                  </div>
                  {{-- product modal --}}
                  <!-- Modal -->
                    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <form action="{{url('/save_product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                                    </div>
                                    <div class="form-group">
                                        @php
                                            $barnds = DB::table('manufactures')->get();
                                        @endphp
                                        <label for="exampleInputEmail1">Brand</label>
                                        <select class="form-control" name="brand_id">
                                            @foreach ($barnds as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        @php
                                            $categories = DB::table('categories')->get();
                                        @endphp
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Description</label>
                                        <input type="text" class="form-control" name="short_description" id="exampleFormControlFile1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Long Description</label>
                                        <textarea class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" name="image" onchange="document.getElementById('bah').src = window.URL.createObjectURL(this.files[0])" required="required" class="form-control">

		 						         <img id="bah" class="img-fluid mt-1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Price</label>
                                        <input type="text" class="form-control" name="price" id="exampleFormControlFile1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Size</label>
                                        <input type="text" class="form-control" name="size" id="exampleFormControlFile1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Color</label>
                                        <input type="text" class="form-control" name="color" id="exampleFormControlFile1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Publication Status</label>
                                        <input type="text" class="form-control" name="publication_status" id="exampleFormControlFile1">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </section>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#product_table').DataTable();
    $('#delete_product').click(function(e){

        e.preventDefault();
        var link = $(this).attr('href');

        bootbox.confirm('Are you want to delete !!', function(confirmed){
            if(confirmed){
                window.location.href = link ;
            }

        });

    });
} );
</script>
@endpush
