@extends('backend.master')

@section('content')
    <section>
        <div class="contaier">
            <div class="row m-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="header_item ">
                                <h5>Edit Brand</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/update_brands')}}" method="POST">

                                @csrf
                                <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" value="{{$brand->name}}" name="brands_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter brand name">

                                    </div>
                                    @php
                                        $categories = DB::table('categories')->get();
                                    @endphp
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name="category_id">

                                            @foreach ($categories as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="brand_description" id="exampleFormControlTextarea1" rows="3">{{$brand->description}}</textarea>

                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="publication_status" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Publication Status
                                        </label>
                                      </div>
                                </div>
                                <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
