@extends('admin.master')

@section('content')
    <header class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>ویرایش دسته</h1>
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
            {!! Form::model($category,['url'=>'admin/category/'.$category->id]) !!}
            {{ method_field('PUT') }}
            <div class="form-group">
                {!! Form::label('name', 'نام دسته',['class'=>'form-control-label']); !!}

                {!! Form::text('name',null,['class'=>'form-control','id'=>'catname']); !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'نام دسته',['class'=>'form-control-label']); !!}
                {!! Form::select('parent_id',$categories,null,['class'=>'form-control','id'=>'myselect']); !!}
            </div>
                {{ Form::submit('ثبت',['class'=>'btn btn-outline-success']) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop