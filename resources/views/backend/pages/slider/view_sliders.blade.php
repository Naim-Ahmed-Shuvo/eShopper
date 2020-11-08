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
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>

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
                                                <label for="exampleFormControlFile1">Example file input</label>
                                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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
