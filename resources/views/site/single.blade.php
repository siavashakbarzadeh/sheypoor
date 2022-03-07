@extends('Layouts.master')

@section('content')
<div class="container-fluid mx-5 my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img width="400" height="200" src="{{ Url('/images/').'/'.$SinglePost->img }}" />
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title m-5">{{ $SinglePost->title }}</div>
                    <h6 class="card-subtitle mb-2 text-muted mr-5 " ><small>سه روز پیش ، فردوس غرب </small></h6>
                    <div class="card-subtitle text-left ml-3" style="color:#0084ff; margin-top: -72px;">{{ number_format($SinglePost->price) }}</div>
                    <p class="card-text m-5" >
                        {{ $SinglePost->desc }}
                    </p>
                    <a href="#" class="card-link mr-5">شماره تلفن : {{ $SinglePost->phone_number }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
                <img style="width: 200px;height: 200px; margin: 5px auto" class="img-fluid rounded-circle center-block" src="{{ Url('img/avatar.png') }}" alt="Card image cap">
                <h5 class="card-title my-5 text-center">کاربر شیپور</h5>
                <div class="card-body">
                    <p class="card-text">شماره تماس تایید شده</p>
                    <button class="btn btn-primary btn-block pb-1">{{ $SinglePost->phone_number }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <h6 class="text-right mr-4">آگهی های مشابه</h6>
    </div>

    <div class="row mt-3 mr-3">

        @foreach($similarPosts as $similar)


            <div class="card p-3 m-3" style="width: 18rem;">
                <img class="card-img-top mr-5" src="{{ Url('/images/').'/'.$similar->img }}" alt="Card image cap" width="150" height="150">
                <div class="card-body">
                    <p class="card-text m-3"><a href="{{ $similar->path() }}">{{ $similar->title }}</a></p>
                </div>
            </div>
        @endforeach
    </div>






</div>
@endsection