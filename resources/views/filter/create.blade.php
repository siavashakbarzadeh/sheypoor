@extends('admin.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.css') }}"  >
    <style>
        .bootstrap-select.show>.dropdown-menu>.dropdown-menu {
            display: block;
        }

        .bootstrap-select > .dropdown-menu > .dropdown-menu li.hidden{
            display:none;
        }

        .bootstrap-select > .dropdown-menu > .dropdown-menu li a{
            display: block;
            width: 100%;
            padding: 3px 1.5rem;
            clear: both;
            font-weight: 400;
            color: #10097e !important;
            text-align: inherit;
            white-space: nowrap;
            background: 0 0;
            border: 0;
        }
    </style>
@endsection

@section('content')

    <header class="py-2 bg-info text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>فیلترها</h1>
                </div>
            </div>
        </div>
    </header>



    <section class="bg-faded py-4 mb-2">
        @if(isset($id))
            {!! Form::open(['url'=>'admin/filter?id='.$id,'files'=>'true']) !!}
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        {!! Form::label('cat_id','انتخاب سر دسته : ') !!}
                        {!! Form::select('cat[]',$cat_list,$id,['class'=>'selectpicker','data-live-search'=>'true','id'=>'cat_list','onchange'=>'getFilter()']) !!}
                    </div>
                </div>
            </div>


                <div class="form-group" id="filter_box">
                    @foreach($filter as $key=>$value)
                    <div id="filter_div_{{ $value->id }}" class="d-flex flex-column product_filter_div">
                        <div class="d-flex justify-content-start py-3">
                            <div class="p3">
                                <input value="{{ $value->name }}" name="filter_name[{{ $value->id }}]"  class="form-control"  placeholder="نام فیلتر..."/>
                            </div>
                            <div class="p3">
                                <input type="text" value="{{ $value->ename }}" name="filter_ename[{{ $value->id }}]" class="form-control"  placeholder="نام لاتین فیلتر ...">
                            </div>
                            <div class="p3">
                                <select id="filter_filed" name="filter_filed" class="form-control" style="float:right;margin-right:10px">
                                    <option @if($value->filed==1) selected="selected" @endif value="1" value="1">فیلد select</option>
                                    <option @if($value->filed==2) selected="selected" @endif value="2">فیلد checkbox</option>
                                </select>
                            </div>
                        </div>
                                @foreach($value->get_child as $key2=>$value2)
                                    <div class="child_filter" id="child_filter_{{ $value2->id }}">
                                        <input type="text" value="{{ $value2->name }}" class="color_input_name" name="filter_child[{{ $value->id }}][{{ $value2->id }}]"/>
                                    </div>
                                @endforeach


                    </div>
                    @endforeach
                </div>

            </div>





    </section>
    @if(isset($id))
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_filter()"></span>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
                    </div>


                </div>
            </div>
        </div>
    </section>
    @endif
    {!! Form::close() !!}
@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        getFilter=function ()
        {
            var cat_id=document.getElementById('cat_list').value;
            window.location='<?= url('admin/filter') ?>?id='+cat_id;

        },
        add_filter=function () {
            var count=document.getElementsByClassName('product_filter_div').length+1;
            var id1="'"+'filter_div-'+count+"'";
            var id2='-'+count;
            var id3="'child_filter-'";
            console.log(id1+' '+id2+' '+id3);
            //alert(count);
            var html = '<div class="d-flex flex-column product_filter_div" id="filter_div-'+count+'"><div  class="d-flex justify-content-start py-3" >' +
                       '<div class="p3">'+
                       '<input name="filter_name[-'+count+']" class="form-control"  placeholder="نام فیلتر"/></div>'+
                       '<div class="p3"><input type="text" name="filter_ename[-'+count+']" class="form-control" style="float: right;" placeholder="نام لاتین فیلتر ..."></div>'+
                       '<div class="p3"><select id="filter_filed-'+count+'" name="filter_filed[-'+count+']" class="form-control" style="float:right;margin-right:10px">'+
                       '<option value="1">فیلد select</option>'+
                       '<option value="2">فیلد checkbox</option></select>'+
                       '<div class="p1"><span class="fa fa-plus" style="color:blue;cursor:pointer;padding-top:15px" onclick="add_child_filter('+id1+','+id2+','+id3+')"></span>'
                       '</div></div></div></div>';


            ;

            $("#filter_box").append(html);

        },
        add_child_filter=function (id1,id2,id3)
        {
            var filed_id=id1.replace('div','filed');
            var filed=document.getElementById(filed_id).value;
            var count=document.getElementsByClassName('child_filter').length+1;
            var div_id=id3+count;

            // console.log(div_id);
            var div1='<p class="child_filter" id="'+div_id+'"></p>';
            var input1='<input type="text" class="color_input_name" name="filter_child['+id2+'][-'+count+']"/>'
            $("#"+id1).append(div1);
            $("#"+div_id).append(input1);
        }

    </script>
    <script type="text/javascript" src="{{ url('/js/bootstrap-select.js') }}"></script>

@endsection