@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$product->name}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">مثال ساده</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('product.update', ['product'=>$product->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام محصول</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$product->name}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">تولیدکننده</label>
             <select class="form-control" name="producer_id">
               <?php foreach ($producers as $producer): ?>
                 <?php if ($product->producer->id == $producer->id): ?>
                   <option value="{{$producer->id}}" selected>{{$producer->name}}</option>
                 <?php else: ?>
                   <option value="{{$producer->id}}">{{$producer->name}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">دسته‌بندی</label>
             <select class="form-control" name="category_id">
               <?php foreach ($categories as $category): ?>
                 <?php if ($product->category->id == $category->id): ?>
                   <option value="{{$category->id}}" selected>{{$category->fa_name}}</option>
                 <?php else: ?>
                   <option value="{{$category->id}}">{{$category->fa_name}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
          </div>
            
            <div class="form-group">
            <label for="exampleInputPassword1">برچسب‌ها</label>
             <select class="form-control" name="tag_id[]" multiple>
               <?php foreach ($tags as $tag): ?>
                 <?php if ($protag->contains('id',$tag->id)): ?>
                   <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                 <?php else: ?>
                   <option value="{{$tag->id}}">{{$tag->name}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
          </div>
            
          <div class="form-group">
            <label for="exampleInputPassword1">قیمت محصول</label>
            <input name="price" type="text" class="form-control" id="exampleInputPassword1" value="{{$product->price}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">تخفیف</label>
            <input name="discount" type="text" class="form-control" id="exampleInputPassword1" value="{{$product->discount}}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">تصویر محصول</label>
              <div class="form-group">
              <img src="/{{$product->image}}" alt="{{$product->name}}" style="height:100px; width:100px">
            </div>
            <input name="image" type="file" id="exampleInputFile">

          </div>
            
             

            
            <div class="form-group">
            <label for="exampleInputFile">فایل محصول</label>
              
            <input name="file" type="file" id="exampleInputFile">

          </div>
          <div class="form-group">
            <label for="exampleInputFile">توضیحات محصول</label>
          </div>
          <textarea name="body" rows="8" cols="140">{{$product->body}}</textarea>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
      </form>
    </div>

  </div>
  <!-- /.box-body -->
</div>
@endsection
