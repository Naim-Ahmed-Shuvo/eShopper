@extends('backend.master')

@section('content')
   <div class="section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-header">
                           <div class="header_item d-flex justify-content-between">
                               <h5>All Brands</h5>
                               <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Add<i class="fas fa-plus"></i></a>
                           </div>
                       </div>
                       <div class="card-body">
                        <table class="table table-striped" id="brand_table">
                            <thead>
                              <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col"> Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            @php
                                $brands = DB::table('manufactures')
                                        ->join('categories', 'manufactures.category_id', '=', 'categories.id')
                                        ->select('manufactures.*', 'categories.name as category_name')
                                        ->get();
                            @endphp
                            <tbody>

                                @foreach ($brands as $index=>$item)
                                     <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category_name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            @if ($item->publication_status == 1)
                                            <span class="label label-success bg-success p-1" >Active</span>
                                            @else
                                            <span class="label label-warning bg-danger p-1">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->publication_status == 1)
                                            <a href="{{url('/de_active_brand')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="far fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{url('/active_brand')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i></a>
                                            @endif
                                        <a href="{{url('/edit_brand')}}/{{$item->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/delete_brand')}}/{{$item->id}}" id="delete_brand" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                          </table>
                       </div>
                   </div>
                   {{-- add brand modal --}}


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <form action="{{url('/save_brands')}}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="brands_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter brand name">

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
                                        <textarea class="form-control" name="brand_description" id="exampleFormControlTextarea1" rows="3"></textarea>

                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="publication_status" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Publication Status
                                        </label>
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
                   {{-- add brand modal ./ --}}
               </div>
           </div>
       </div>
       </div>
@endsection


@push('js')
<script>
    $(document).ready( function () {
    $('#brand_table').DataTable();
    // $('#delete_category').click(function(e){

    //     e.preventDefault();
    //     var link = $(this).attr('href');

    //     bootbox.confirm('Are you want to delete !!', function(confirmed){
    //         if(confirmed){
    //             window.location.href = link ;
    //         }

    //     });

    // });
} );
</script>
@endpush
