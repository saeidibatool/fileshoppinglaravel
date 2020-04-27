@extends('layouts.admin')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">لیست پیا‌های پشتیبانی</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-6">
          <div class="dataTables_length" id="example1_length">
            <label>Show
              <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
               entries
             </label>
           </div>
         </div>
         <div class="col-sm-6">
           <div id="example1_filter" class="dataTables_filter">
             <form class="">
               {{csrf_field()}}
               <label>Search:
                 <input type="text" class="form-control input-sm" name="name" placeholder="" aria-controls="example1">
                 <input class="btn btn-primary btn-sm" type="submit" name="" value="جستجو">
               </label>
             </form>
             <!-- <label>Search:
               <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
             </label> -->
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
              <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 73.35px;" aria-label="حذف: activate to sort column ascending">نام صاحب پیام</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 269.483px;" aria-label="عنوان دسته‌بندی: activate to sort column ascending">موضوع پیام</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 269.483px;" aria-label="عنوان دسته‌بندی: activate to sort column ascending">متن پیام</th>
                
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 73.35px;" aria-label="حذف: activate to sort column ascending">تایید پیام</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($supports as $support): ?>
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$support->user->name}}</td>
                    <td class="sorting_1">{{$support->subject}}</td>
                    <td class="sorting_1">{{$support->content}}</td>
                  
                  <td>
                      <a href="{{route('support.edit', ['support'=>$support->id])}}" type="button" class="btn btn-block btn-success">تایید نظر</a>
                  </td>
                  
                </tr>
              <?php endforeach; ?>

            </tbody>
           </table>
         </div>
       </div>
    </div>
  </div>
  {{$supports->links()}}
  <!-- /.box-body -->
</div>
@endsection
