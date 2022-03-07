@extends('admin.master')

@section('content')
    <header class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>ویرایش آگهی ها</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-faded py-4 mb-2">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="input-group" style="direction:ltr !important;">
                        <input type="text" class="form-control" style="direction:rtl;" placeholder="آگهی مورد نظر را جستجو کنید">
                        <span class="input-group-btn">
            <button class="btn btn-success">جستجو</button>
          </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($post,['url'=>'admin/post/'.$post->id,'files'=>true]) !!}
                {{ method_field('PUT') }}

                <div class="form-group">
                    {!! Form::label('title', 'عنوان آگهی',['class'=>'form-control-label']); !!}
                    {!! Form::text('title',null,['class'=>'form-control','id'=>'title']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mycats', 'دسته بندی',['class'=>'form-control-label']); !!}
                    {!! Form::select('cat_id[]',$category,$post_cat,['class'=>'form-control selectpicker','id'=>'mycats','multiple'=>'multiple']); !!}
                </div>

                <div class="form-group bg-faded p-3">
                    <div class="row">
                        <img src="{{ Url('/images/').'/'."$post->img" }}" width="180" height="180">
                    </div>
                    {!! Form::label('file', 'آپلود عکس',['class'=>'form-control-label']); !!}
                    {!! Form::file('img', ['class'=>'form-control-file','id'=>'file']) !!}

                    <small class="form-text text-muted">
                        حداکثر 3 مگ
                    </small>
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'قیمت',['class'=>'form-control-label']); !!}
                    {!! Form::text('price',null,['class'=>'form-control','id'=>'price']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone_number', 'شماره تلفن',['class'=>'form-control-label']); !!}
                    {!! Form::text('phone_number',null,['class'=>'form-control','id'=>'phone_number']); !!}

                </div>
                <div class="form-group">
                    {!! Form::label('address', 'آدرس',['class'=>'form-control-label']); !!}
                    {!! Form::textarea('address',null,['rows'=>8,'cols'=>80,'class'=>'form-control','id'=>'address']); !!}
                </div>


                <div class="form-group">
                    {!! Form::label('editor1', 'محتوا',['class'=>'form-control-label']); !!}
                    {!! Form::textarea('desc',null,['rows'=>8,'cols'=>80,'class'=>'form-control','id'=>'editor1']); !!}
                </div>


                {{ Form::submit('ویرایش',['class'=>'btn btn-outline-success']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop