@extends('admin.master')
@section('content')
<div class="content-wrapper container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chào mừng bạn đến trang quản trị
        <small>Welcome!</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-usd" aria-hidden="true"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Doanh thu</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn hàng</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đơn hàng chờ xác nhận</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive-md">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tổng(VNĐ)</th>
                                        <th>Địa chỉ</th>
                                        <th>Thời gian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value['order_code']}}</td>
                                        <td>{{$value['total_money']}}</td>
                                        <td>{{$value['address']}}</td>
                                        <td>{{date('Y-m-d H:i:s', strtotime($value['created_at']))}}</td>
                                        <td><a href="#" title="Xem chi tiết"><i class="fa fa-eye" style="color: #0df21c;"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                       
                        </div>
                        {{$order->links()}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top sản phẩm bán chạy</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($product as $value)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{url('uploads/product')}}/{{$value->image}}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$value['name']}}
                                        <span class="label label-warning pull-right">Đã bán: {{$value['total_product']}}</span></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    
  </div>
@stop