@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">افزودن پست جدید</h3>
  </div>
  <!-- /.box-header -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">

      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('post.store')}}">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">عنوان پست</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{old('title')}}">
          </div>
            <div class="form-group">
            <label for="exampleInputFile">تصویر</label>
            <input name="image" type="file" id="exampleInputFile">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">متن کامل پست</label>
          </div>
          <textarea name="description" id ="body" rows="8" cols="140" class="ckeditor">{{old('description')}}</textarea>
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
