@extends('backend.master')

@section('content')
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Order Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Customer Name/th>
                                    <th scope="col">Mobile Number</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                  <th scope="row">{{$view_order_info->name}}</th>
                                    <td>{{$view_order_info->phone}}</td>

                                  </tr>

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Shipping  Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">First Name/th>
                                    <th scope="col">last Name/th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">{{$view_order_info->first_name}}</th>
                                    <td>{{$view_order_info->last_name}}</td>
                                    <td>{{$view_order_info->address}}</td>
                                    <td>{{$view_order_info->mobile}}</td>
                                    <td>{{$view_order_info->email}}</td>

                                  </tr>

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Order  Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Qty</th>
                                    <th scope="col">Product Sub Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordered_products as $item)
                                      <tr>
                                        <th scope="row">{{$ordered_products->product_name}}</th>
                                        <td>{{$ordered_products->product_price}}</td>
                                        <td>{{$ordered_products->product_sales_quantity}}</td>


                                      </tr>
                                    @endforeach


                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
