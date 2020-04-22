@extends('layouts.mastermain')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/pics/basket.jpg'); background-size:auto, 100%;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span></p>
                <h1 class="mb-0 bread">سبد خرید</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>تصویر محصول</th>
                            <th>نام محصول</th>
                            <th>دانلود</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($factors as $factor): ?>
                            <?php $products = $factor->product()->get();?>
                            @foreach ($products as $product)
                                <tr class="text-center">

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(/{{$product->image}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{$product->name}}</h3>
                                </td>

                                <td class="price">
                                    <a class="btn btn-primary py-3 px-4" href="/download/{{$product->id}}">دانلود</a>
                                </td>
                            </tr><!-- END TR-->
                            
                            @endforeach
                            

                          <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
</section>
@endsection
