@extends('layouts.usersidebar')
                
@section('content')

<div class="sidebar-box ftco-animate col-9">
    
    <section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class=" ftco-animate">
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
</div>
@endsection
