@extends('backend.master')

@section('content')
<section>
    <div class="container">
        <div class="row m-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="header-content d-flex justify-content-between">
                            <h3 class="card-title">All Categories</h3>
                        <a href="{{url('/add_category')}}" class="btn btn-sm btn-success">Add <i class="fas fa-plus"></i></a>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                              <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index=>$item)
                                <tr>
                                <th scope="row">{{$index+1}}</th>
                                    <td>{{$item->name}}</td>
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
                                            <a href="{{url('/de_active_category')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="far fa-thumbs-up"></i></a>
                                        @else
                                            <a href="{{url('/active_category')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i></a>
                                        @endif

                                        <a href="{{url('/edit_category')}}/{{$item->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/delete_category')}}/{{$item->id}}"   id="delete_category" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                  </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
    $('#delete_category').click(function(e){

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
