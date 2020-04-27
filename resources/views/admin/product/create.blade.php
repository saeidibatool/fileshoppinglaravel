@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">افزودن محصول</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام محصول</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{old('name')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">دسته‌بندی محصول</label>
             <select class="form-control" name="category">
               <?php foreach ($categories as $category): ?>
                 <option value="{{$category->id}}">{{$category->fa_name}}</option>
               <?php endforeach; ?>
             </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">تولیدکننده</label>
             <select class="form-control" name="producer">
               <?php foreach ($producers as $producer): ?>
                 <option value="{{$producer->id}}">{{$producer->name}}</option>
               <?php endforeach; ?>
             </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">قیمت محصول</label>
            <input name="price" type="text" class="form-control" id="exampleInputPassword1"  value="{{old('price')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">تخفیف</label>
            <input name="discount" type="text" class="form-control" id="exampleInputPassword1"  value="{{old('discount')}}">
          </div>
            <div class="form-group">
            <label for="exampleInputPassword1">برچسب‌ها</label>
             <select class="form-control" name="tag_id[]" multiple>
               <?php foreach ($tags as $tag): ?>
                 <option value="{{$tag->id}}">{{$tag->name}}</option>
               <?php endforeach; ?>
             </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">تصویر محصول</label>
            <input name="image" type="file" id="exampleInputFile">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">فایل محصول</label>
            <input name="file" type="file" id="exampleInputFile">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">توضیحات محصول</label>
          </div>
          <textarea name="body" id ="body" rows="8" cols="140" class="ckeditor">{{old('body')}}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace( 'body' );
         </script>
            

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

    <!-- Form Element sizes -->

    <!-- /.box -->


    <!-- /.box -->

    <!-- Input addon -->

    <!-- /.box -->

  </div>
  <!-- /.box-body -->
</div>
@endsection
