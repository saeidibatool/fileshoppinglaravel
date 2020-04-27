@extends('layouts.mastermain')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/pics/search.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> </p>
        <h1 class="mb-0 bread">محصولات</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">

    <div class="row">
      <?php foreach ($products as $pro): ?>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="product">
            <a href="#" class="img-prod"><img class="img-fluid" src="/{{$pro->image}}" alt="{{$pro->name}}" style="width:100%; height:40vh;">
              <?php if ($pro->discount != 0): ?>
                <span class="status">{{$pro->discount}}%</span>
              <?php endif; ?>

              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
              <h3><a href="#">{{$pro->name}}</a></h3>
              <?php if ($pro->discount != 0): ?>
                <div class="text py-3 pb-4 px-3 text-center">
                    <div class="d-flex">
                      <div class="pricing">
                        <p class="price">
                          <s class="text-danger ">
                            <del>
                              <span class="mr-2 price-dc text-danger small"><small>{{$pro->price}}</small></span>
                              <span class="price-dc text-danger"><small>تومان</small> <br></span>
                            </del>
                          </s>
                          <span class="price-sale ">{{(1-($pro->discount)/100)*$pro->price}}</span>
                          <span class="price-sale"> تومان</span>
                        </p>
                      </div>
                    </div>
                </div>
                <?php else: ?>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <div class="d-flex">
                        <div class="pricing">
                          <p class="price">
                            <span class="price-sale ">{{$pro->price}}</span>
                            <span class="price-sale"> تومان</span>
                          </p>
                        </div>
                      </div>
                    </div>
                <?php endif; ?>

              <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">
                  <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                    <span><i class="ion-ios-menu"></i></span>
                  </a>
                  <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1 add-to-cart"
                     data-id="{{$pro->id}}">
                    <span><i class="ion-ios-cart"></i></span>
                  </a>
                  <a href="#" class="heart d-flex justify-content-center align-items-center add-to-wish"
                     data-id="{{$pro->id}}">
                    <span><i class="ion-ios-heart"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

    </div>



   



  </div>
</section>


@ecdsection
