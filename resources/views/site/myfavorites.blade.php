@extends('Layouts.master')

@section('content')
    <div class="container-fluid mx-5 my-5" >
        <h4>همه آگهی ها در سراسر ایران</h4>
        @foreach($favorites as $favorites)
            <div class="row my-5 ">
                <div class="col-md-2">
                    <img src="{{  Url('/images/').'/'."$favorites->img" }}" width="220" height="180" />
                </div>
                <div class="col-md-8">
                    <div class="d-flex flex-column">
                        <div class="p-2">{{ $favorites->title }}</div>
                        <div class="p-2">تهران</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="p-2">
                        <i class="fa fa-trash red" aria-hidden="true">
                            <input type="hidden" value="{{ $favorites->id }}" class="posts_fav" >
                            <input type="hidden" value="{{ \Auth::user()->id }}" class="users_fav" >
                        </i>
                     </div>

                </div>
            </div>

        @endforeach
        <div class="border-bottom"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".red").click(function () {


                    var post_id = $(this).find('.posts_fav').val();
                    var user_id = $(this).find('.users_fav').val();
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
                        url : '<?= url('delfav') ?>',
                        success : function(data)
                        {
                            if(data==1)
                            {
                                window.location.href='http://localhost:8000/myfavorites';
                            }
                        }
                    });



            });

        });

    </script>
@endsection