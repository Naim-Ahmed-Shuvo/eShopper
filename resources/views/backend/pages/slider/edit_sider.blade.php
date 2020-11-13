@extends('backend.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="header_item">
                                <h5>Edit Slider</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/update_slider')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="slider_id" value="{{$slider->id}}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$slider->title}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Titl">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sub Title</label>
                                            <input type="text" class="form-control" name="sub_title" value="{{$slider->sub_title}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Sub Titl">

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
