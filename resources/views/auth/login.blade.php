@extends('layouts.master')

@section('content')


    <div class="container-fluid" style="margin: 50px 20px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card" style="margin-right:360px;">
                <div class="card-title">ورود</div>

                <div class="card-body" >
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">پسورد</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="captcha">

                            <span>{!! captcha_img() !!}</span>

                            <button type="button"  class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>

                        </div>

                        <input id="captcha" type="text" class="form-control" placeholder="کد امنیتی بالا را وارد کنید" name="captcha">


                        @if ($errors->has('captcha'))

                            <span class="help-block">

                                  <strong>{{ $errors->first('captcha') }}</strong>

                              </span>

                        @endif

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   ورود
                                </button>

                                <a class="btn btn-link" href="{{ url('forgetpass') }}">
                                    کلمه عبورتو یادت نیس!
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
    $(".btn-refresh").click(function(){


        $.ajax({

            type:'GET',

            url:'/refresh_captcha',

            success:function(data){
                console.log(data);

                $(".captcha span").html(data.captcha);

            }

        });

    });
});



</script>



