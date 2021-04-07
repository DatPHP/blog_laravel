@extends('layouts.default')

@section('title', 'Tạo tài khoản mới')

@section('content')
   {!! Form::open(array('url' => '/user/create', 'class' => 'form-horizontal')) !!}
   {{ csrf_field() }}

       @if (isset($id))
       {!! Form::hidden('id', $id) !!}
       @endif
      <div class="form-group">
         {!! Form::label('name', 'Họ và tên', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
             {!! Form::text('name', $user['name'] ?? '', array('class' => 'form-control', 'placeholder' => 'Nhap Ho Va Ten')) !!}                      
         </div>

      </div>

      <div class="form-group">
         {!! Form::label('email', 'Địa chỉ email', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::email('email', $user['email']?? '', array('class' => 'form-control', 'placeholder' => 'Địa chỉ email thật để nhận phản hồi')) !!}
         </div>
      </div>

      <div class="form-group">

            {{Form::label('password', 'Password',array('class' => 'col-sm-2 control-label'))}}

            <div class="col-sm-10">
            {{ Form::text('password',$user['password']?? '', array('class' => 'form-control','placeholder' => 'Nhap password')) }}
            </div>
      </div>


      <div class="form-group">
         {!! Form::label('website', 'Nhập website', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
             {!! Form::text('website', $user['website']?? '' , array('class' => 'form-control', 'placeholder' => 'Nhap website')) !!}                      
         </div>
      </div>


      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Gửi tin nhắn', array('class' => 'btn btn-success')) !!}
         </div>
      </div>

   {!! Form::close() !!}

@endsection