@php use Carbon\Carbon; @endphp
@extends('Layouts.master')

@section('content')
    <div class="container-fluid mx-5 my-5" >
        <h4>پست های من</h4>
        @foreach($myposts as $all)
            <div class="row my-5 ">
                <div class="col-md-2">
                    <img src="{{  Url('/images/').'/'."$all->img" }}" width="220" height="180" />
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column">
                        <div class="p-2">{{ $all->title }}</div>
                        <div class="p-2">تهران</div>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex flex-column">
                        @php
                            $d = explode(' ',$all->created_at);
                            $d=explode('-',$d[0]);

                            $dt = Carbon::create($d[0], $d[1], $d[2]);
                            $now = Carbon::now();
                            if($now > $dt->addDays(3))
                            {
                                echo '<div class="p-2 red">آگهی شما منقضی شده است!</div>';
                                  try{
                                        $api = new \Kavenegar\KavenegarApi("4D4A66787052466348376761455738334F756A6D636C53423277796946537848");
                                        $sender = "10004346";
                                        $message = "آگهی منقضی شده";
                                        $receptor = array("09120814408");
                                        $result = $api->Send($sender,$receptor,$message);
                                        if($result){
                                            echo "پیامی ارسال شده";
                                        }
                                    }
                                    catch(\Kavenegar\Exceptions\ApiException $e){
                                        // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                                        echo $e->errorMessage();
                                    }
                                    catch(\Kavenegar\Exceptions\HttpException $e){
                                        // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                                        echo $e->errorMessage();
                                    }

                            }
                        @endphp

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="p-2">
                        <a href="{{ Url('pay') }}">
                        <img src="https://image.flaticon.com/icons/svg/351/351645.svg" alt="Ladders free icon" title="Ladders free icon" width="80" height="80">
                        </a>
                    </div>
                </div>




            </div>

        @endforeach
        <div class="border-bottom"></div>
    </div>


@endsection