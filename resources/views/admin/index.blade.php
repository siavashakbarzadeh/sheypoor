@extends('admin.master')

@section('content')

    <meta id="token" name="csrf_token" content="{{ csrf_token() }}">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style-type: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($errors->has('email'))
        <span class="help-block">
           <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <header class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>داشبورد</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="py-4 mb-4 bg-faded">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-primary btn-block  create_post" data-toggle="modal" data-target="#addPostModal">
                        <i class="fa fa-plus ml-2"></i>افزودن آگهی



                    </a>
                </div>
                <div class="col-md-3">

                    <a class="btn btn-success btn-block create_category" data-toggle="modal" data-target="#addCategoryModal"  >
                        <i class="fa fa-plus ml-2"></i>افزودن دسته
                    </a>

                </div>
                <div class="col-md-3">
                    <a class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus ml-2"></i>افزودن کاربر
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- start ADD POST MODAL -->
    @include('admin.section.postModal')
    <!-- end ADD POST MODAL -->

    <!-- start ADD CATEGORY MODAL -->
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addCategoryModalLabel">افزودن دسته بندی</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">




                    <div class="form-group">
                    {!! Form::label('name', 'نام دسته',['class'=>'form-control-label']); !!}

                    {!! Form::text('name',null,['class'=>'form-control','id'=>'catname']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'نام دسته',['class'=>'form-control-label']); !!}
                        {!! Form::select('parent_id',[],null,['class'=>'form-control','id'=>'myselect']); !!}
                    </div>



                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger ml-2" data-dismiss="modal">بستن</button>
                    <input class="btn btn-outline-success store_category" type="submit" value="ثبت دسته" data-dismiss="modal">

                </div>


            </div>
        </div>
    </div>
    <!-- end ADD CATEGORY MODAL -->
    <!-- start ADD USER MODAL -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="addUserModalLabel">افزودن کاربر</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="form-control-label">نام</label>

                            {!! Form::text('name',null,['class'=>'form-control','id'=>'name']); !!}
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">ایمیل</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">کلمه عبور</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="form-control-label">تکرار کلمه عبور</label>
                            <input type="password" class="form-control" id="confirmpasssword">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger ml-2" data-dismiss="modal">بستن</button>
                    <button class="btn btn-outline-success store_user" data-dismiss="modal">ثبت کاربر</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end ADD USER MODAL -->
    <!-- start Laest Posts -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <div class="card text-center card-primary text-white mb-3">
                        <div class="card-block">
                            <h3>آگهی ها</h3>
                            <h1 class="display-4"><i class="fa fa-pencil"></i> {{ $postCount }}</h1>
                            <a href="{{ url('admin/post') }}" class="btn btn-sm btn-outline-secondary text-white">مشاهده</a>
                        </div>
                    </div>
                    <div class="card text-center card-success text-white mb-3">
                        <div class="card-block">
                            <h3>دسته ها</h3>
                            <h1 class="display-4"><i class="fa fa-folder-open-o"></i> {{ $categoryCount }}</h1>
                            <a href="/admin/category" class="btn btn-sm btn-outline-secondary text-white">مشاهده</a>
                        </div>
                    </div>
                    <div class="card text-center card-warning text-white">
                        <div class="card-block">
                            <h3>کاربران</h3>
                            <h1 class="display-4"><i class="fa fa-users"></i> {{ $userCount }}</h1>
                            <a href="{{ Url('admin/user') }}" class="btn btn-sm btn-outline-secondary text-white">مشاهده</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>آخرین آگهی ها</h4>
                        </div>

                        <table class="table table-striped">
                            <thead class="thead-inverse">
                            <tr class="text-right">
                                <th>#</th>
                                <th class="text-right">عنوان</th>
                                <th class="text-right">دسته</th>
                                <th class="text-right">تاریخ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i =1; @endphp
                            @foreach($posts as $post)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $post->title }}</td>
                                <td>تست</td>
                                <td>فروردین 97</td>
                                <td><a href="" class="btn btn-secondary"><i class="fa fa-angle-double-right"></i> مشاهده</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end Laest Posts -->

@stop

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        var token = $('input[name=_token]').val();
       $('.create_category').click(function () {
          $.ajax({
             type:'GET',
             url:'admin/category/create',
             data: '_token='+token,
              success:function(data)
              {
                  // console.log(data);
                  $('#myselect').empty();
                  $.each(data,function (i,value) {
                      $('#myselect').append($('<option>').text(value).attr('value',i));
                  });


              }
          });
       })

        $('.create_post').click(function () {

            $.ajax({
                type:'GET',
                url:'admin/post/create',

                success:function(data)
                {
                    console.log(data[1]);
                    var category = data[0];
                    var state = data[1];
                    $('#mycats').empty();
                    $.each(category,function (i,value) {
                        $('#mycats').append($('<option>').text(value).attr('value',i));
                    });
                    $('#state').empty();
                    $.each(state,function (i,value) {
                        $('#state').append($('<option>').text(value).attr('value',i));
                    });


                }
            });
        });

       $('#state').change(function () {
           var state = $('#state').val();
           // alert(state);

           $.ajax({
               type:'GET',
               url : 'post/getCity',
               data:{
                   '_token':$('input[name=csrf_token]').val(),
                   'state':state
               },
               success:function (data) {
                   console.log(data);
                   $('#city').empty();
                   $.each(data,function (i,value) {
                       $('#city').append($('<option>').text(value).attr('value',i));
                   });
               }
           });
       })


        $('.store_category').click(function () {
            var catname=$('#catname').val();

            var myselect=$('#myselect').val();


            $.ajax({
                type:'POST',
                url:'admin/category',
               data: {
                  '_token':$('input[name=csrf_token]').val(),
                  'name': catname,
                  'parent_id':myselect

                },

                success:function(data)
                {
                    window.location.href = 'admin/category';


                }
            });
        });
        //store User
        $('.store_user').click(function () {

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmpassword = $('#confirmpassword').val();

            var token = $('input[name=_token]').val();

            $.ajax({
                type:'POST',
                url:'admin/user',
                data: {
                    '_token':token,
                    'name': name,
                    'email':email,
                    'password':password,
                    'confirmpassword':confirmpassword

                },

                success:function(data)
                {
                    // window.location.href = 'admin/user';
                    console.log(data);


                }
            });
        });

    });


</script>
