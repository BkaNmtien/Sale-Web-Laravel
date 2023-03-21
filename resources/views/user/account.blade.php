@extends('user.master')
@section('main')
<main class="main__content_wrapper">
        
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Tài khoản</h1>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <form action="{{route('user.login')}}" method="POST">
                        @csrf
                        @if(isset($paramCheckout))
                            <input type="hidden" name="paramCheckout" value="{{$paramCheckout}}">
                        @endif
                        <div class="col">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Đăng nhập</h2>
                                    <p class="account__login--header__desc">Đăng nhập nếu bạn đã có tài khoản.</p>
                                    @if(Session::has('s'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>{{Session::get('s')}}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="account__login--inner">
                                    <input class="account__login--input" placeholder="Email Addres" type="text" name="email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="account__login--input" placeholder="Password" type="password" name="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Nhớ mật khẩu</label>
                                        </div>
                                        <button class="account__login--forgot" type="submit">Quên mật khẩu?</button>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Đăng nhập</button>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">Hoặc</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                    @if(isset($paramCheckout))
                                        <a class="account__social--link facebook" target="_self" href="#">Facebook</a>
                                        <a class="account__social--link google" target="_self" href="/google-log-in?page=loginParam" >Google</a>
                                    @else
                                        <a class="account__social--link facebook" target="_self" href="#">Facebook</a>
                                        <a class="account__social--link google" target="_self" href="/google-log-in" >Google</a>
                                    @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('user.register')}}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Tạo tài khoản</h2>
                                    <p class="account__login--header__desc">Đăng kí nếu bạn chưa có tài khoản.</p>
                                </div>
                                <div class="account__login--inner">
                                    <input class="account__login--input" placeholder="Username" type="text" name="name">
                                    <div class="mt-0">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input class="account__login--input" placeholder="Email Addres" type="email" name="email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="account__login--input" placeholder="Password" type="password" name ="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="account__login--input" placeholder="Phone Number" type="number" name="phone">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <button class="account__login--btn primary__btn mb-10" type="submit">Đăng kí</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>
    <!-- End login section  -->

</main>

@stop