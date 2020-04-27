@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$tag->name}}</h3>
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
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('tag.update', ['tag'=>$tag->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$tag->name}}">
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
      </form>
    </div>
    
  </div>

</div>
@endsection
