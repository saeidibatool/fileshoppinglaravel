@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$user->name}}</h3>
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
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('user.update', ['user'=>$user->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام کاربر</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">پست الکترونیک</label>
            <input name="email" type="text" class="form-control" id="exampleInputPassword1" value="{{$user->email}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">نقش</label>
             <select class="form-control" name="roles_id[]" multiple>
               <?php foreach ($roles as $role): ?>
                 <?php if ($user_roles->contains('id',$role->id)): ?>
                   <option value="{{$role->id}}" selected>{{$role->fa_name}}</option>
                 <?php else: ?>
                   <option value="{{$role->id}}">{{$role->fa_name}}</option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
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
