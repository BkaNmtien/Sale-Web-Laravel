@extends('user.master')
@section('main')
<main class="main__content_wrapper">
        
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container-fluid">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">Thông tin tài khoản</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list "><a href="my-account.html">Hồ sơ của tôi</a></li>
                            <li class="account__menu--list active"><a href="my-account-2.html">Đơn hàng của tôi</a></li>
                            <li class="account__menu--list"><a href="wishlist.html">Đổi mật khẩu</a></li>
                            <li class="account__menu--list"><a href="{{route('user.logout')}}">Đăng suất</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content container-fluid">
                        <div class="row">
                            <h2 class="account__content--title h3 mb-20">Lịch sử đơn hàng</h2>
                                <div class="account__table--area">
                                    <table class="account__table table table-responsive-sm table-hover">
                                        <thead class="account__table--header">
                                            <tr class="account__table--header__child">
                                                <th class="account__table--header__child--items col-md-2">Mã đơn hàng</th>
                                                <th class="account__table--header__child--items col-md-4">Sản phẩm</th>
                                                <th class="account__table--header__child--items col-md-3">Thông tin đơn hàng</th>
                                                <th class="account__table--header__child--items col-md-2">Trạng thái</th>
                                                <th class="account__table--header__child--items col-md-1">Hành động</th>	 	 	 	 	 	 	 	
                                            </tr>
                                        </thead>
                                        <tbody class="account__table--body mobile__none">
                                            @foreach($order as $data)
                                            <tr>
                                                <!-- @foreach($history_buy as $value) -->
                                                <td scope="row" class="col-md-2">{{$loop->iteration}}</td>
                                                <td class="account__table--body__child--items col-md-5">
                                                    <div class="d-flex flex-row media ">
                                                        <a class="" href="#">
                              
                                                       <img src="{{url('uploads/product')}}/Ao-polo-nam-cool-max.jpg" style="width: 80px" alt="" >
                                                        </a>
                                                        <div class="w-100">
                                                            <p class="font-weight-bold px-2 mb-0 text-truncate" style="max-width: 300px;" >fhskjdfhksdằefafwfweffafewfefjafdkshdưadwdwdwd</p>
                                                            <div class="d-flex justify-content-between  p-2">
                                                                <div class="price">
                                                                    <p class="">Size:</p>
                                                                </div>
                                                                <div class="quantity">
                                                                    <p class="">x2</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row-reverse">
                                                                <p>1000đ</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- @endforeach -->
                                                <td class="account__table--body__child--items col-md-3">
                                                    <span>Ngày mua: {{$data['created_at']}} </span><br>
                                                    <span>Địa chỉ nhận hàng: {{$data['address']}}</span><br>
                                                    <span>Lời nhắn: {{$data['note']}}</span>
                                                </td>
                                                @if($data['status'] == 1)
                                                    <td class="account__table--body__child--items col-md-2 text-success">Đã xác nhận</td>
                                                @else
                                                    <td class="account__table--body__child--items col-md-2 text-danger">Chưa xác nhận</td>
                                                @endif
                                                <td class="account__table--body__child--items col-md-1">Huy</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- <tbody class="account__table--body mobile__block">
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Order</strong>
                                                    <span>#2014</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Date</strong>
                                                    <span>February 06, 2022</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Payment Status</strong>
                                                    <span>Paid</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Fulfillment Status</strong>
                                                    <span>Unfulfilled</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total</strong>
                                                    <span>$40.00 USD</span>
                                                </td>
                                            </tr>
                                        </tbody> -->
                                    </table>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping4.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

    </main>

@stop