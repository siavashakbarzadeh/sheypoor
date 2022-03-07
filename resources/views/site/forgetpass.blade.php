@extends('layouts.master')

@section('content')
    <div class="container-fluid" style="margin: 50px 20px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="margin-right:360px;">
                    <div class="card-title">ورود</div>
                    @if(isset($success))
                       {{ $success }}
                    @endif
                    <div class="card-body" >
                        <form class="form-horizontal" method="POST" action="{{ url('sendnewpass') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">ایمیل</label>

                                <div class="col-md-6">
                                    <input placeholder="ایمیل خود را وارد کنید" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>


                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ارسال کلمه عبور جدید
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
