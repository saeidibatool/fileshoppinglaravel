@extends('layouts.mastermain')

@section('content')
<!--Start Slider-->
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
      <?php foreach ($sliders as $slider): ?>
        <div class="slider-item" style="background-image: url(/{{$slider->image}})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">هر فایلی رو می‌تونید اینجا پیدا کنید</h1>
                        <h2 class="subheading mb-4">برنامه‌نویسی؟‌بازی؟ کتاب میخوای؟ همه تو سایت ما هست</h2>
                        <p><a href="#" class="btn btn-primary">مشاهده جزییات</a></p>
                    </div>

                </div>
            </div>
        </div>
      <?php endforeach; ?>



    </div>
</section>
<!--End Slider-->

<!--Tozihat-->
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">


            <div class="col-md-6 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="">
                        <h3 class="heading">کیفیت برتر</h3>
                        <span>محصولات با کیفیت</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="">
                        <h3 class="heading">پشتیبانی</h3>
                        <span>پشتیبانی 24 ساعته</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Tozihat-->

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
      <!-- <div class="row"> -->
      <div class="row">
        <div class="col-md-12 col-lg-4 order-md-last align-items-stretch d-flex">
            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(pics/fav2.jpg);background-size:cover;">
                <div class="text text-center">
                    <h2>محبوب‌ترین محصولات</h2>
                    <p>بقیه این محصولات رو خیلی دوس داشتن</p>
                    <p><a href="#" class="btn btn-primary">خرید آنی</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="container">
                <div class="row">
                  <?php foreach ($favorites as $favorite): ?>
                    <div class="col-md-12 col-lg-6 ftco-animate">
                        <div class="product">
                            <a href="{{ url('pro/'.$favorite->id) }}" class="img-prod"><img class="img-fluid" style="height:60vh; width:100%;"src="/{{$favorite->image}}" alt="{{$favorite->name}}">
                              <?php if ($favorite->discount != 0): ?>
                                <span class="status">{{$favorite->discount}}%</span>
                              <?php endif; ?>
                                <div class="overlay"></div>
                            </a>

                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ url('pro/'.$favorite->id) }}">{{$favorite->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <span class="mr-2 price-dc">{{$favorite->price}}</span>
                                            <span class="price-dc"> تومان</span>
                                            <?php if ($favorite->discount != 0): ?>
                                              <span class="price-sale">{{(1-($favorite->discount)/100)*$favorite->price}}</span>
                                              <span class="price-sale"> تومان</span>
                                            <?php endif; ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
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
          </div>
      </div>



      <!-- </div> -->
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">پرفروش‌ترین محصولات ما رو اینجا ببینید</span>
                <h2 class="mb-4">سرزمین فایل ما رو تماشا کنید</h2>
                <p>پیشنهاد ما به شما</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <?php foreach ($bestsellers as $bestseller): ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{ url('pro/'.$bestseller->id) }}" class="img-prod"><img class="img-fluid" style="height:50vh; width:100vw;"src="/{{$bestseller->image}}" alt="{{$bestseller->name}}">
                      <?php if ($bestseller->discount != 0): ?>
                        <span class="status">{{$bestseller->discount}}%</span>
                      <?php endif; ?>
                        <div class="overlay"></div>
                    </a>

                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ url('pro/'.$bestseller->id) }}">{{$bestseller->name}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span class="mr-2 price-dc">{{$bestseller->price}}</span>
                                    <span class="price-dc"> تومان</span>
                                    <?php if ($bestseller->discount != 0): ?>
                                      <span class="price-sale">{{(1-($bestseller->discount)/100)*$bestseller->price}}</span>
                                      <span class="price-sale"> تومان</span>
                                    <?php endif; ?>

                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
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



<section class="ftco-section ftco-category ftco-no-pt" style="margin:10px;">
    <div class="container">
      <!-- <div class="row"> -->
      <div class="row">
        <div class="col-md-12 col-lg-4 order-md-last align-items-stretch d-flex">
            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(pics/cat.jpg);background-size:cover;">
                <div class="text text-center">
                    <h2>دسته‌بندی محصولات</h2>
                    <p><a href="#" class="btn btn-primary">برای دیدن محصولات هر دسته کلیک کنید</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="container">
                <div class="row">
                  <?php foreach ($allcategories as $category): ?>
                    <div class="col-md-12 col-lg-6 ftco-animate">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                         style="background-image: url(/{{$category->image}});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="{{ route('cat.show',['cat'=>$category->id]) }}">{{$category->fa_name}}</a></h2>
                        </div>
                    </div>
                    </div>
                  <?php endforeach; ?>


                </div>
            </div>
          </div>
      </div>



      <!-- </div> -->
    </div>
</section>


<!--nazar Sanji-->
<
<!--End Nazarsanji-->
<hr>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
            </div>
        </div>
    </div>
</section>

<!--Start Subscribe-->
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">مشترک شدن در خبرنامه ما</h2>
                <span>دریافت ایمیل درباره آخرین مغازه ها و پیشنهادات ویژه</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="ایمیل آدرس خود را وارد کنید">
                        <input type="submit" value="اشتراک" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End Subscribe-->
@endsection
