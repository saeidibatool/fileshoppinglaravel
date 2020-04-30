@extends('layouts.usersidebar')
                
@section('content')
<div class="sidebar-box ftco-animate col-9">
<!-- ............................................. -->


    <div class="container">
          <div class="row">
            <div class="col-md-12 ftco-animate">
                <h3  class="tit">ویرایش اطلاعات</h3>
            </div>
                <form action="{{route('userupdate')}}" enctype="multipart/form-data" class="col-md-12 bg-white contact-form" method="POST">
                @csrf
            <div class="col-md-12 ftco-animate titr">
            <h5 class="tit">نام</h5>
              <div class="form-group">
                <input name="name" type="text" class="form-control" value="{{auth::user()->name}}">
              </div>
            </div>
                    
            
            <div class="col-md-12 ftco-animate titr">
            <h5 class="tit"> جنسیت</h5>
                @if(isset(auth::user()->gender_id))
                    @foreach ($genders as $gender)
                    <label class="container">{{$gender->fa_name}}
                        @if(auth::user()->gender->id == $gender->id)
                            <input type="checkbox" name="gender_id" value="{{$gender->id}}" checked>
                        @else
                            <input type="checkbox" name="gender_id" value="{{$gender->id}}">
                         @endif
                      </label>
                    @endforeach
                @else
                    @foreach ($genders as $gender)
                    <label class="container">{{$gender->fa_name}}
                        <input type="checkbox" name="gender_id" value="{{$gender->id}}">
                      </label>
                    @endforeach
                @endif
            </div>
            
            <div class="col-md-12 ftco-animate titr">
                <h5 class="tit"> تصویر</h5>
            <div class="form-group">
              <img src="/{{auth::user()->image}}" alt="{{auth::user()->name}}" style="height:100px; width:100px">
            </div>

            <input class="form-control" name="image" type="file" id="exampleInputFile">
          </div>
                    
                    
            <div class="col-md-12 ftco-animate">
            <button class="btn btn-primary btn" type="submit" style="margin:2vh;">ذخیره تغییرات</button>
            </div>
                </form>


            </div>
        </div>
    </div>












<!-- ............................................. -->
</div>
@endsection
