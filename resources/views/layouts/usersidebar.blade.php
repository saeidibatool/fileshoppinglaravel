<!DOCTYPE html>
<html lang="fa">
 <head>
   @include('layouts.partials.head')
 </head>
 <body  dir="rtl" class="goto-here">
<div class="wrapper-wide">
@include('layouts.partials.header')
    <div class="hero-wrap hero-bread" style="background-image: url('/pics/profile 3.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="ml-2"><a href="index.html">خانه</a></span></p>
                    <h1 class="mb-0 bread">پروفایل کاربری</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="sidebar-box ftco-animate col-3 bg-primary">
                    <h3 class="heading" style=" text-align: center" >{{auth()->user()->name}}</h3>
                        <ul class="categories">
                            <li><a href="userpanel">اطلاعات کاربری </a></li>
                            <li><a href="useredit">ویرایش اطلاعات </a></li>
                            <li><a href="/basket">سبد خرید </a></li>
                            <li><a href="/favorite">لیست علاقمندی‌ها</a></li>
                            <li><a href="/factor">خریدهای انجام شده</a></li>
                            <li><a href="/support">گزارش مشکلات</a></li>
                            <li>
                                        @auth
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        @endauth
                            </li>
                        </ul>
                </div>

                @yield('content')
            </div>
        </div> 
</div>
    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')
</div>
 </body>
</html>




