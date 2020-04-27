@extends('layouts.mastermain')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/pics/cat2.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="">خانه</a></span> </p>
        <h1 class="mb-0 bread">محصولات</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container" id="latest_category">
    <div class="justify-content-center">
      <div class="col-md-10 mb-5 text-center " >
        <ul class="product-category" id="sub-cat">
          <?php $i = 1; ?>
          <li><a href="#tab-cat{{$i}}">{{$cat->fa_name}}</a></li>

          <?php foreach ($c as $category): ?>
            <?php $i += 1; ?>
            <li><a href="#tab-cat{{$i}}">{{$category->fa_name}}</a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="" >

      <?php $i = 1; ?>
      <div class="tab_content" id="tab-cat{{$i}}">
        <?php foreach ($pros as $pro): ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="{{ url('pro/'.$pro->id) }}" class="img-prod"><img class="img-fluid" style="width:100%; height:30vh;" src="/{{$pro->image}}" alt="{{$pro->name}}">
                <?php if ($pro->discount != 0): ?>
                  <span class="status">{{$pro->discount}}%</span>
                <?php endif; ?>

                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="{{ url('pro/'.$pro->id) }}"></a>{{$pro->name}}</h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span class="mr-2 price-dc">{{$pro->price}} تومان</span>
                      <?php if ($pro->discount != 0): ?>
                        <span class="price-sale">{{(1-$pro->discount/100) * $pro->price}} تومان</span></p>
                      <?php endif; ?>
                  </div>
                </div>
                <div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <a href="#" class="d-flex justify-content-center align-items-center text-center">
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


        <?php foreach ($c as $category): ?>
          <?php $i+=1; ?>
          <?php $products = App\Product::where('category_id',$category->id)->get();?>
          <div class="tab_content" id="tab-cat{{$i}}">
            <?php foreach ($products as $pro): ?>
              <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                  <a href="{{ url('pro/'.$pro->id) }}" class="img-prod"><img style="width:100%; height:30vh;" class="img-fluid" src="/{{$pro->image}}" alt="{{$pro->name}}">
                    <?php if ($pro->discount != 0): ?>
                      <span class="status">{{$pro->discount}}%</span>
                    <?php endif; ?>

                    <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="{{ url('pro/'.$pro->id) }}"></a>{{$pro->name}}</h3>
                    <div class="d-flex">
                      <div class="pricing">
                        <p class="price"><span class="mr-2 price-dc">{{$pro->price}} تومان</span>
                          <?php if ($pro->discount != 0): ?>
                            <span class="price-sale">{{(1-$pro->discount/100) * $pro->price}} تومان</span></p>
                          <?php endif; ?>
                      </div>
                    </div>
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
        <?php endforeach; ?>


    </div>
    
  </div>
    
</section>


@endsection
