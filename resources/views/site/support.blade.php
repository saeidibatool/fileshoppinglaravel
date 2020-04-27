@extends('layouts.usersidebar')
                
@section('content')


<div class="sidebar-box ftco-animate col-9">
  <section class="ftco-section contact-section bg-light">
      

          {{-- ========================flash message ========================== --}}
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any()))
        @foreach ($errors->all() as $item)
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $item }}</strong>
        </div>
        @endforeach
        @endif

        <div class="container">
      <div class="row block-12">
        <div class="col-md-12 order-md-last d-flex">
          <form  action="{{route('support.store') }}" method="POST" class="bg-white p-5 contact-form">
            @csrf
            
            
            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="موضوع">
            </div>
            <div class="form-group">
              <textarea  id="" name="content" cols="30" rows="7" class="form-control" placeholder="پیام"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="ارسال پیام" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        
      </div>
    </div>
      
  </section>

</div>
@endsection