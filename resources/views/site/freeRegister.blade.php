
@extends('Layouts.master')

@section('content')
    @if(\Auth()->check()==false)
        <div class="container">
            <div class="row mt-5">


                <div class="col-md-12 mt-5">

                    <h1 class="text-center mb-5" style="color: #aa4a24"> ابتدا وارد پنل خود شوید ، سپس اقدام به ثبت آگهی نمایید! </h1>



                </div>

            </div>
        </div>


    @else
        <div class="container">
            <div class="row mt-5">

                <div class="col-md-10">
                    <div class="d-flex flex-column">
                        <h4 class="m-5">ثبت آگهی</h4>
                    </div>

                    {!! Form::open(['url'=>'newPost','files'=>true,'id'=>'store_post']) !!}
                    <div class="d-flex justify-content-start">
                        <div class="d-flex flex-column">
                            <div class="p-2">گروه بندی</div>
                            <div class="p-2">
                                <div class="form-control" data-toggle="modal"  id="groupcat" style="cursor: pointer" data-target="#showCategoryModal">انتخاب کنید<i class="fa fa-angle-left icon-left"></i>

                                </div>
                                <input type="hidden" name="cat_id" id="mycatid" value="">
                            </div>
                            <div class="p-2">عنوان آگهی</div>
                            <div class="p-2"><input type="text" class="form-control" name="title" placeholder="عنوان مناسبی برای آکهی تان انتخاب کنید" />
                            </div>

                            <div class="p-2">توضیحات</div>
                            <div class="p-2">
                                <textarea class="form-control" name="desc" rows="7" placeholder="توضیحات مناسبی برای آگهی تان وارد کنید"></textarea>
                            </div>

                            <div class="p-0">قیمت</div>
                            <div class="p-2"><input type="text" class="form-control" name="price" placeholder="قیمت" />
                                <input type="hidden" value="@if(\Auth()->check()){{ \Auth()->user()->id }}@endif" name="user_id">
                            </div>

                        </div>
                    </div>
                    {!! Form::label('file', 'آپلود عکس',['class'=>'form-control-label']); !!}
                    {!! Form::file('img', ['class'=>'form-control-file','id'=>'file']) !!}
                    {!! Form::close() !!}
                    <div class="modal fade" id="showCategoryModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-faded">
                                    <h5 class="modal-title" id="addPostModalLabel">انتخاب گروه بندی</h5>
                                    <button class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" id="maincategory" style="margin:0 auto;">
                                    <div class="d-flex flex-column" >
                                        @foreach($category as $category)
                                            <div class="p-2" >
                                                <div class="d-flex flex-row mr-5 brdr-btm">
                                                    <div class="p-2"><i class="fa fa-mobile icon-blue"></i></div>
                                                    <div class="p-2 blue-color">

                                                        <button id="catid" class="btn" value="{{ $category->id }}">{{ $category->name }}</button>

                                                    </div>
                                                    <div class="p-2">
                                                        <i id="arrow" class="fa fa-angle-left icon-blue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>


                                </div>

                                <div class="modal-body" id="submodal" style="margin:0 auto; display: none;">
                                    <div class="d-flex flex-column" >

                                        <div class="p-2" >
                                            <div class="d-flex flex-row mr-5 brdr-btm">

                                                <div class="p-2 blue-color" id="subcat">


                                                </div>

                                            </div>
                                        </div>


                                    </div>


                                </div>


                                <div class="modal-footer">
                                    <button class="btn btn-outline-danger ml-2" data-dismiss="modal">بستن</button>


                                </div>
                            </div>
                        </div>
                    </div>


                    {{ Form::submit('ثبت آگهی',['class'=>'btn btn-block btn-outline-success my-5','data-dismiss'=>'modal','onclick'=>'form_submit()']) }}

                </div>


                {{--<div class="col-md-6 mt-5">--}}

                {{--<div class="bg-faded">--}}

                {{--<div class="d-flex flex-column">--}}
                {{--<div class="p-2">عکس آگهی</div>--}}
                {{--<div class="p-2">--}}
                {{--<div class="d-flex flex-row">--}}
                {{--<div class="p-2">--}}
                {{--<div class="upload_img">--}}
                {{--<div class="upload_plus">+</div>--}}
                {{--<div class="upload_text">افزودن عکس</div>--}}
                {{--<input type="file" class="file_upload"/>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="p-2">--}}
                {{--<div class="upload_img">--}}
                {{--<div class="upload_plus">+</div>--}}
                {{--<div class="upload_text">افزودن عکس</div>--}}
                {{--<input type="file" class="file_upload"/>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="p-2">--}}
                {{--<div class="upload_img">--}}
                {{--<div class="upload_plus">+</div>--}}
                {{--<div class="upload_text">افزودن عکس</div>--}}
                {{--<input type="file" class="file_upload"/>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="p-2">--}}
                {{--<div class="upload_img">--}}
                {{--<div class="upload_plus">+</div>--}}
                {{--<div class="upload_text">افزودن عکس</div>--}}
                {{--<input type="file" class="file_upload"/>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="p-2">یک تصویر بهتر از هزاران کلمه</div>--}}
                {{--<div class="p-2 mr-5">--}}
                {{--<img src="img/capture.png" class="mr-5" />--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                {{--<div class="d-flex justify-content-end">--}}
                {{--<div class="p-2">--}}

                {{--{{ Form::submit('ثبت آگهی',['class'=>'btn btn-outline-success','data-dismiss'=>'modal','onclick'=>'form_submit()']) }}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

            </div>
        </div>

    @endif





    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.modal-body #catid').click(function () {

                var catid=$(this).val();


                $.ajax({
                    type : 'POST',
                    data :
                        {
                            '_token': $('input[name=_token]').val(),
                            'catid': catid,

                        },
                    url : '<?= url('subCatFreeRegister') ?>',
                    success : function(data)
                    {
                        console.log(data);

                        $('#maincategory').hide();

                        $('#submodal').show();



                        $.each(data, function(index, obj){

                            console.log(obj.name);
                            var btn = $("<button id='subcategories' class='btn mt-2' onclick='SubCatSelect("+obj.id+")'></button><br />");
                            btn.append(obj.name);


                            $('#subcat').append(btn);

                        });


                    }
                });
            });




        });

        function form_submit() {
            document.getElementById("store_post").submit();
        }


        SubCatSelect = function (id) {

            $.ajax({
                type : 'POST',
                data :
                    {
                        '_token': $('input[name=_token]').val(),
                        'subcatid': id,

                    },
                url : '<?= url('GetNameOfSubCategory') ?>',
                success : function(data)
                {
                    console.log(data);
                    $('#submodal').hide();
                    $("#showCategoryModal .close").click()
                    $('#groupcat').text(data.name);
                    $('#mycatid').val(data.id);
                    // alert(data.id);


                }
            });




        }

    </script>



@endsection