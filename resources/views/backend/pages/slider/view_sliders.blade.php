@extends('backend.master')

@section('content')
    <section>
        <div class="container">
            <div class="row m-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header_item d-flex justify-content-between">
                                <h5>All Sliders</h5>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_slder_modal">Add<i class="fas fa-plus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped" id="slider_table">
                                <thead>
                                  <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Sub Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sliders = DB::table('sliders')->get();
                                    @endphp

                                    @foreach ($sliders as $index=>$item)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{url($item->image)}}" height="50" width="60" alt="">
                                        </th>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->sub_title}}</td>
                                        <td>
                                            @if ($item->publication_status == 1)
                                            <span class="label label-success bg-success p-1" >Active</span>
                                            @else
                                            <span class="label label-warning bg-danger p-1">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->publication_status == 1)
                                                <a href="{{url('/de_active_sider')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="far fa-thumbs-up"></i></a>
                                            @else
                                                <a href="{{url('/active_sider')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i></a>
                                            @endif

                                            <a href="{{url('/edit_sider')}}/{{$item->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/delete_sider')}}/{{$item->id}}"   id="delete_product" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                              </table>
                        </div>

                        {{-- slider add modal --}}
                        <!-- Modal -->
                            <div class="modal fade" id="add_slder_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{url('/save_slider')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Titl">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sub Title</label>
                                                    <input type="text" class="form-control" name="sub_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Sub Titl">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Image</label>
                                                    <input type="file" name="image" id="image"  onchange="document.getElementById('slider_img').src = window.URL.createObjectURL(this.files[0])" class="form-control-file" id="exampleFormControlFile1">

                                                    <img src="" id="slider_img" alt="">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="1" name="publication_status" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                    PubliCation Status
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#slider_table').DataTable();
    $('#delete_product').click(function(e){

        e.preventDefault();
        var link = $(this).attr('href');

        bootbox.confirm('Are you want to delete !!', function(confirmed){
            if(confirmed){
                window.location.href = link ;
            }

        });

    });
    $('#image').change( function(){
        $('#slider_img').css({
            'height': '100',
            'width': '150',
        });
    })
} );
</script>
@endpush
