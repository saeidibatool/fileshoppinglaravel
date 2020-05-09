<body class="goto-here">


  <!-- <script type="text/javascript" src="/js/custom.js"></script> -->


<!--header-->
<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pl-4 d-flex topper align-items-center">
                        <div class="icon ml-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">07132309534</span>
                    </div>
                    <div class="col-md pl-4 d-flex topper align-items-center">
                        <div class="icon ml-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">info@webrubik.com</span>
                    </div>
                    <div class="col-md-5 pl-4 d-flex topper align-items-center text-lg-left">
                        <span class="text">ارسال بین 3-5 روز کاری</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header-->

<!--Start Nav-->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">صفحه اصلی</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> منو
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">


                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">دسته‌های اصلی</a>
                  <div class="dropdown-menu" id="top-dropdown-menu" aria-labelledby="dropdown04">
                    <?php foreach ($categories as $category): ?>
                      <a class="dropdown-item" href="{{ route('cat.show',['cat'=>$category->id]) }}">{{$category->fa_name}}</a>

                    <?php endforeach; ?>

                  </div>

                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">دسته‌های فرعی</a>
                  <div class="dropdown-menu" id="top-dropdown-menu" aria-labelledby="dropdown04">
                    <?php foreach ($cats as $cat): ?>
                      <a class="dropdown-item" href="{{ route('cat.show',['cat'=>$cat->id]) }}">{{$cat->fa_name}}</a>

                    <?php endforeach; ?>

                  </div>

                </li>
                <li class="nav-item"><a href="{{route('postt.index')}}" class="nav-link">وبلاگ</a></li>
                <li class="nav-item"><a href="{{ Route('contactt.index') }}" class="nav-link">تماس با ما</a></li>
                @guest
                  <li class="nav-item"><a class="nav-link" href="{{route('login')}}">ورود/ثبت نام</a></li>
                @endguest

                @auth
                    <li class="nav-item">

                        <a class="nav-link" href="{{route('userpanel')}}">
                            خانه
                        </a>
                    </li>
                
                
                     <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>


                    <?php if ($baskets != null && count($baskets) > 0): ?>
                      <li class="nav-item cta cta-colored float-left">
                        <a href="/basket" id="shop-cart" class="nav-link">
                          <span class="icon-shopping_cart"></span>
                          [{{count($baskets)}}]
                        </a>
                      </li>
                    <?php endif; ?>
                @endauth

                
                <li class="nav-item cta cta-colored float-left">
                  <form class="form-inline nav-link">
                    {{csrf_field()}}
                     <input class="form-control-sm  mr-sm-2" type="text" name="name" placeholder="محصول مورد نظر">
                     <button class="btn btn-primary btn-sm" type="submit">جستجو</button>
                  </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
