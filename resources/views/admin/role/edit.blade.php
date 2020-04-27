@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ویرایش {{$role->name}}</h3>
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
      <form role="form" method="post" enctype="multipart/form-data" action="{{route('role.update', ['role'=>$role->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">نام سطح دسترسی</label>
            <input name="fa_name" type="text" class="form-control" id="exampleInputEmail1" value="{{$role->fa_name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">عنوان</label>
            <input name="en_name" type="text" class="form-control" id="exampleInputPassword1" value="{{$role->en_name}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">دسترسی‌ها</label>
             <select class="form-control" name="permission_id[]" multiple>
                 <option value=""></option>
               <?php foreach ($permissions as $permission): ?>
                 <?php if ($role_permissions->contains('en_name',$permission->en_name)): ?>
                   <option value="{{$permission->id}}" selected>{{$permission->fa_name}}</option>
                 <?php else: ?>
                   <option value="{{$permission->id}}">{{$permission->fa_name}}</option>
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
