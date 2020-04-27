@extends('layouts.mastermain')

@section('content')

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

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3">{{$post->title}}</h2>
                <p> 
                </p>
                <p>
                    <img src="/{{$post->image}}" alt="" class="img-fluid">
                </p>
                <p>
                    {{ $post->description }}
                </p>
               

              
                <div class="about-author d-flex p-4 bg-light">
                    <div class="bio align-self-md-center ml-4">
                        <img src="/pics/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                    </div>
                    <div class="desc align-self-md-center">
                        <h3>{{$post->user->name}}</h3>
                        @if($post->averageRating > 0)
                            <span>امتیاز {{ round($post->averageRating, 2) }} از ۵</span>
                        @else
                        <span>برای این پست امتیازی ثبت نشده‌است</span>
                        @endif
                        
                        <p>
                            {{ Verta::instance($post->created_at)->format('%B %d، %Y') }}
                            {{ substr(strip_tags($post->description),0,200) }}{{strlen($post->description)>300 ? "..." : ""}}
                        </p>
                        
                    </div>
                </div>

                 <?php  $comment = $post->comments->where('status','1'); ?>
                <div class="pt-5 mt-5">
                    <h3 class="mb-5">نظر سنجی</h3>
                    <ul class="comment-list">
                        @foreach ($comment as $item)

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="/pics/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$item->user->name}}</h3>
                                <div class="meta"> {{ Verta::instance($post->created_at)->format('%B %d، %Y') }}</div>
                                <p>
                                    {{ $item->comment }}
                                </p>
                                
                            </div>
                        </li>
                        @endforeach
                      

                    </ul>
                    <!-- END comment-list -->
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">تجربه خود را با ما در میان بگذارید</h3>
                        @if(Auth::check())
                        <form action="{{route('commen.store') }}" method="POST"class="p-5 bg-light">
                            @csrf
                            
                            <div class="form-group">
                                <label for="message">پیام</label>
                                <textarea name="comment" id="message" cols="20" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">رتبه</label>
                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                                  value="" data-size="xs">
                              </div>
                
                              <input type="text" value="{{ $post->id }}" name="post_id" hidden>
                              <input type="text" value="{{ auth()->user()->id }}" name="user_id" hidden>
                            <div class="form-group">
                                <input type="submit" value="ارسال نظر" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                        @else
                        <h2 class="text-danger">برای ثبت نظرخودابتدالاگین کنید</h2>
                        @endif
                    </div>
                </div>  
              
            </div> <!-- .col-md-8 -->

           <!-- Sidebar-->
           <div class="col-lg-4 sidebar ftco-animate">
            

         
            <div class="sidebar-box ftco-animate">
                <h3 class="heading">محصولات</h3>
                <ul class="categories">
                    <?php foreach ($cats as $category): ?>
                    <li><a href="{{ route('cat.show',['cat'=>$category->id]) }}">{{$category->fa_name}}</a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="sidebar-box ftco-animate">
                <h3 class="heading">آخرین پست ها</h3>
                @foreach ($latest as $item)
                <div class="block-21 mb-4 d-flex">
                    <a href="{{route('post.show',['post'=>$item->id])}}" class="blog-img ml-4" style="background-image: url(/{{$item->image}});"></a>
                    <div class="text">
                        <h3 class="heading-1">
                            <a href="#">
                           {{$item->title}}
                        </a>
                        </h3>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span>{{ Verta::instance($item->created_at)->format('%B %d، %Y') }}</a></div>
                            <div><a href="#"><span class="icon-person"></span> {{$item->user->name}}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
               
               
            </div>

           
         
        </div>

        </div>
    </div>
</section> <!-- End section -->


@endsection