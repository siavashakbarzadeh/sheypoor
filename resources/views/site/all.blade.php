@extends('Layouts.master')

@section('content')
    <div class="container-fluid mx-5 my-5" >
        <h4>همه آگهی ها در سراسر ایران</h4>
        @foreach($all as $all)
        <div class="row my-5 ">
            <div class="col-md-2">
                <img src="{{  Url('/images/').'/'."$all->img" }}" width="220" height="180" />
            </div>
            <div class="col-md-8">
                <div class="d-flex flex-column">
                    <div class="p-2"><a href="{{ $all->path() }}">{{ $all->title }}</a></div>
                    <div class="p-2">تهران</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="p-2">
                    <i class="fa fa-star icon-gray" aria-hidden="true">
                        <input type="hidden" value="{{ $all->id }}" class="posts_fav" >
                        @if(\Auth::check())
                        <input type="hidden" value="{{ \Auth::user()->id }}" class="users_fav" >

                        @endif
                    </i>
                    <div class="plzlogin"></div>
                </div>
                <div class="p-2">لحظاتی پیش</div>
            </div>
        </div>

        @endforeach
        <div class="border-bottom"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".icon-gray").click(function () {
                if($(this).hasClass('stars'))
                {
                    $(this).removeClass('stars');
                }else
                {
                    $(this).addClass('stars');

                    var post_id = $(this).find('.posts_fav').val();
                    var user_id = $(this).find('.users_fav').val();
                    // if(user_id ="undefined")
                    // {
                    //     // alert('plz login!!');
                    //     $('.plzlogin').html('لاگین کن اول!');
                    //     return false;
                    // }

                    console.log(post_id);
                    console.log(user_id);
                    $.ajax({
                        type : 'POST',
                        data :
                            {
                                '_token': $('input[name=_token]').val(),
                                'post_id': post_id,
                                'user_id': user_id
                            },
                        url : '<?= url('favorites') ?>',
                        success : function(data)
                        {
                            console.log(data);
                        }
                    });
                }


            });

        });

    </script>
@endsection