@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$post->title}}</h3>
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
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('post.update', ['post'=>$post->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">عنوان پست</label>
            <input name="en_name" type="text" class="form-control" id="exampleInputEmail1" value="{{$post->title}}">
          </div>
          

          <div class="form-group">
            <label for="exampleInputEmail1">تصویر</label>
            <div class="form-group">
              <img src="/{{$post->image}}" alt="{{$post->title}}" style="height:100px; width:100px">
            </div>

            <input class="form-control" name="image" type="file" id="exampleInputFile">
          </div>
            
            <div class="form-group">
            <label for="exampleInputFile">متن کامل پست</label>
          </div>
          <textarea name="description" id ="body" rows="8" cols="140" class="ckeditor">{{$post->description}}</textarea>
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
