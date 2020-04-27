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
                          ?>
                          <?php foreach ($favorites as $favorite): ?>
                            

                            <tr class="text-center">
                                <td class="product-remove">
                                  <form class="" action="{{route('favorite.destroy', ['favorite'=>$favorite->id])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-outline-danger" style="color:none; bordeR:1px solid white !important;">حذف</button>
                                  </form>
                                </td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(/{{$favorite->product->image}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{$favorite->product->name}}</h3>
                                    <p>{{$favorite->product->body}}</p>
                                </td>

                                <td class="price">{{$favorite->productprice}} تومان</td>
                                <td class="price">{{$favorite->productdiscount/100*$favorite->product->price}} تومان</td>
                            </tr><!-- END TR-->

                          <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
    </div>
</section>
</div>
@endsection
