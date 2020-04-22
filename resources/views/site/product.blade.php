@extends('layouts.mastermain')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/pics/product.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> </p>
        <h1 class="mb-0 bread">محصولات تکی</h1>
      </div>
    </div>
  </div>
</div>

{{-- ========================flash message ========================== --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any()))
@foreach ($errors->all() as $item)
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>{{ $item }}</strong>
</div>
@endforeach
@endif

<section class="ftco-section">
  <div class="container">
    <div class="row">

      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="" class="image-popup"><img src="/{{$pro->image}}" class="img-fluid" alt="{{$pro->name}}"></a>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <h3>{{$pro->name}}</h3>
        <div class="rating d-flex">
          <p class="text-left mr-4">
            <a href="#" class="mr-2">5.0</a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
          </p>
          <p class="text-left mr-4">
            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">رای</span></a>
          </p>
          <p class="text-left">
            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">فروخته شده</span></a>
          </p>
        </div>
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

        <p>{{$pro->body}}</p>
        <div class="row mt-4">

          <div class="w-100"></div>

          <div class="w-100"></div>
          <div class="col-md-12">
            <?php if ($rating != 0): ?>
              <p style="color: #000;">امتیاز {{round($rating, 2)}} از ۵</p>
            <?php else: ?>
              <p style="color: #000;">برای این محصول امتیازی ثبت نشده‌است</p>
            <?php endif; ?>
          </div>
        </div>
        <p><a class="btn btn-black py-3 px-5 add-to-cart" data-id="{{$pro->id}}">اضافه به سبد خرید </a></p>
      </div>



      <div class="container">
        <div class="row">
          <div class="col-lg-12 ftco-animate">
            <div class="pt-5 mt-5">
          <h3 class="mb-5">نظر سنجی</h3>
          <?php if (count($comments) != 0): ?>
            <h4 class="mb-5">برای این محصول {{count($comments)}} نظر  وارد شده‌است</h4>
          <?php else: ?>
            <h4 class="mb-5">برای این محصول نظری وارد نشده‌است</h4>
          <?php endif; ?>

          <ul class="comment-list">
            <?php foreach ($comments as $comment): ?>
              <li class="comment">
                  <div class="vcard bio">
                      <img src="/pics/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                      <h3>{{$comment->user->name}}</h3>
                      <div class="meta">پنج شنبه - ۲۴ بهمن ۱۳۹۸ ساعت 09:45</div>
                      <p>{{$comment->comment}}</p>

                  </div>
              </li>
            <?php endforeach; ?>



          </ul>
          <!-- END comment-list -->
          <?php if (Auth::check()): ?>
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">برای محصول ما نظر ثبت کنید و به آن امتیاز دهید</h3>
                <form action="{{route('commen.store') }}" method="POST" class="p-5 bg-light">
                  @csrf

                  <div class="form-group">
                      <label for="message">پیام</label>
                      <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>


                  <div class="form-group">
                    <label class="control-label">رتبه</label>
                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                      value="" data-size="xs">
                  </div>

                  <input type="text" value="{{ $pro->id }}" name="product_id" hidden>
                  <input type="text" value="{{ auth()->user()->id }}" name="user_id" hidden>


                  <div class="form-group">
                      <input type="submit" value="ارسال نظر" class="btn py-3 px-4 btn-primary">
                  </div>
                </form>
            </div>
          <?php else: ?>
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5 text-danger">برای وارد کردن نظر وارد شوید</h3>
            </div>
          <?php endif; ?>

      </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">محصولات</span>
        <h2 class="mb-4">محصولات مشابه</h2>
        <p>سلامتی خود را تضمین کنید</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

      @foreach ($mortabet as $item)

      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" style="width:253px;height:290px;" src="/{{$item->image}}" alt="Colorlib Template">
            <span class="status">{{$item->discount}}%</span>
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
          <h3><a href="#">{{ $item->name }}</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span class="mr-2 price-dc">{{$item->price}} تومان</span><span class="price-sale">{{$item->price}}
                    تومان</span></p>
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
      @endforeach
    </div>
  </div>
</section>

@endsection
