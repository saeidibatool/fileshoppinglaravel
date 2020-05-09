
@extends('layouts.mastermain')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/weblog-img/10.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center" >
            <p class="breadcrumbs"><span class="ml-2"><a href="" style="color:#b50011;">خانه</a></span></p>
                <h1 class="mb-0 bread" style="color:#b50011;">پست های جدید</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="row">


                    @foreach ($posts as $item)
                    <?php  $comment = $item->comments->where('status','1'); ?>
                    <div class="col-md-12 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="{{route('postt.show',['postt'=>$item->id])}}" class="block-20" style="background-image: url('{{$item->image}}');">
                            </a>
                            <div class="text d-block pr-md-4">
                                <div class="meta mb-3">
                                    <div><a href="#">{{ Verta::instance($item->created_at)->format('%B %d، %Y') }}</a></div>
                                    <div><a href="#">{{$item->user->name}}</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> {{count($comment)}}</a></div>
                                </div>
                                <h3 class="heading"><a href="{{route('postt.show',['postt'=>$item->id])}}">
                               {{$item->title}}
                            </a></h3>
                                <p>
                                    {{ substr(strip_tags($item->description),0,200) }}{{strlen($item->description)>300 ? "..." : ""}}
                                </p>
                                <p><a href="{{route('postt.show',['postt'=>$item->id])}}" class="btn btn-primary py-2 px-3">بیشتر بخوانید</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                                     
                </div>
            </div>
            <!-- .col-md-8 -->
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
                        <a href="{{route('postt.show',['postt'=>$item->id])}}" class="blog-img ml-4" style="background-image: url(/{{$item->image}});"></a>
                        <div class="text">
                            <h3 class="heading-1">
                                <a href="{{route('postt.show',['postt'=>$item->id])}}">
                               {{$item->title}}
                            </a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>{{ Verta::instance($item->created_at)->format('%B %d، %Y') }}</a></div>
                                <div><a href=""><span class="icon-person"></span> {{$item->user->name}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                   
                </div>

               

             
            </div>

        </div>
    </div>
</section>
<!-- End section -->


@endsection
