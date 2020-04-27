@extends('layouts.usersidebar')
                
@section('content')

<div class="sidebar-box ftco-animate col-9">

    <section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>حذف</th>
                            <th>تصویر محصول</th>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th>تخفیف</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            $discount = 0;
                            $sum = 0;
                            $ids = [];
                          ?>
                          <?php foreach ($baskets as $basket): ?>
                            <?php
                              $product = App\Product::find($basket->product_id);
                              $sum += $product->price;
                              $discount += $product->discount/100*$product->price;
                                array_push($ids, $basket->id)
                            ?>

                            <tr class="text-center">
                                <td class="product-remove">
                                  <form class="" action="{{route('basket.destroy', ['basket'=>$basket->id])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-outline-danger" style="color:none; bordeR:1px solid white !important;">حذف</button>
                                  </form>
                                </td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(/{{$product->image}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->body}}</p>
                                </td>

                                <td class="price">{{$product->price}} تومان</td>
                                <td class="price">{{$product->discount/100*$product->price}} تومان</td>
                            </tr><!-- END TR-->

                          <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>کد تخفیف</h3>
                    <p>کد تخفیف خود را وارد کنید</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">استفاده از حروف کوچک و بزرگ الزامیست</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">تایید کد تخفیف</a></p>
            </div>

            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>صورت حساب</h3>
                    <p class="d-flex">
                        <span>جمع کل</span>
                        <span>{{$sum}} تومان</span>
                    </p>

                    </p>
                    <p class="d-flex">
                        <span>تخفیف</span>
                        <span>{{$discount}} تومان</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>جمع کل</span>
                        <span>{{$sum - $discount}} تومان</span>
                    </p>
                </div>
                <p><a href="{{route('factor.create', ['request'=>$ids])}}" class="btn btn-primary py-3 px-4">پرداخت</a></p>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
