@extends('backend.master')

@section('content')
   <section>
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-header">
                           <div class="header_content">
                               <h5>Edit Category</h5>
                           </div>
                       </div>
                       <div class="card-body">
                            <form action="{{url('/update_product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <input type="hidden" value="{{$product_info->id}}" name="product_id">
                               <div class="row">
                                   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" value="{{$product_info->name}}" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                                    </div>
                                   </div>
                                   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" name="image" onchange="document.getElementById('bah').src = window.URL.createObjectURL(this.files[0])" required="required" class="form-control">

		 						         <img id="bah" class="img-fluid mt-1">
                                    </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-lg-4">
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
                                   </div>
                                   <div class="col-lg-4">
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
                                   </div>
                                   <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Description</label>
                                        <input type="text" class="form-control" value="{{$product_info->short_description}}" name="short_description" id="exampleFormControlFile1">
                                    </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Long Description</label>
                                    <textarea class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="3">{{$product_info->long_description}}</textarea>
                                    </div>
                                   </div>
                                   <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Price</label>
                                        <input type="text" class="form-control" value="{{$product_info->price}}" name="price" id="exampleFormControlFile1">
                                    </div>
                                   </div>
                                   <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Size</label>
                                        <input type="text" class="form-control" value="{{$product_info->size}}" name="size" id="exampleFormControlFile1">
                                    </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Color</label>
                                        <input type="text" class="form-control" value="{{$product_info->color}}" name="color" id="exampleFormControlFile1">
                                    </div>
                                   </div>
                                   <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Publication Status</label>
                                        <input type="text" class="form-control" name="publication_status" id="exampleFormControlFile1">
                                    </div>
                                   </div>
                               </div>
                               <button type="submit" class="btn btn-primary">Save </button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection
