@extends('layouts.mastermain')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('pics/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> </p>
          <h1 class="mb-0 bread">ارتباط با ما</h1>
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



  <section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>آدرس:</span> ایران - شیراز - بلوار جمهوری</p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>تلفن:</span> <a href="tel://1234567920">07132309534</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>ایمیل:</span> <a href="mailto:info@yoursite.com">info@webrubik.com</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>وب سایت</span> <a href="#">webrubik.com</a></p>
            </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form  action="{{route('contact.store') }}" method="POST" class="bg-white p-5 contact-form">
            @csrf
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="نام">
            </div>
            <div class="form-group">
              <input type="email"  name="email" class="form-control" placeholder="ایمیل">
            </div>
            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="موضوع">
            </div>
            <div class="form-group">
              <textarea  id="" name="content" cols="30" rows="7" class="form-control" placeholder="پیام"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="ارسال پیام" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>


@endsection