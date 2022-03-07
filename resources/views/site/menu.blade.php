@extends('Layouts.master')

@section('content')

    <div class="form-group">
        {!! Form::label('state', 'استان',['class'=>'form-control-label']); !!}
        {!! Form::select('state',$state,null,['class'=>'form-control','id'=>'state']); !!}
    </div>

    <div class="container-fluid mx-5 my-5" >

        <div class="col-lg-12 bg-faded">

                    <div class="d-flex flex-row">
                        @foreach($filter as $key=>$value)
                        <div class="p-2">{{ $value->name }}</div>

                                @if($value->filed==1)
                                <div class="d-flex flex-column">
                                    <div class="p-2">
                                        <select class="form-control" id="select" style="width: 150px !important;" onchange="set_filter()">
                                            <option value="">...</option>
                                        @foreach($value->get_child as $child)

                                            <option class="search_selected" value="{{ $value->ename }}_{{ $child->id }}">{{ $child->name }}</option>

                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                @elseif($value->filed==2)
                                <div class="d-flex flex-column">
                                    <div class="p-2">
                                        @foreach($value->get_child as $child)
                                       <input type="checkbox" class="search_checkbox" id="filter_li_<?= $child->id ?>"
                                            onclick="set_filter('<?= $value->id ?>','<?= $child->id?>','<?= $child->name?>')" value="{{ $value->ename }}_{{ $child->id }}" />
                                            {{ $child->name }}
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                        @endforeach
                    </div>


        </div>

        <h4>همه آگهی ها در سراسر ایران</h4>
        <div class="border-bottom"></div>

        <div  id="show_product">
            @include('include.post_list',['product'=>$post])
        </div>

    </div>

    <?php
    $url=Url('ajax/set_filter_product');
    $stateUrl=Url('ajax/state');
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        function set_filter(id1,id2,name)
        {
            // alert(name);
            var array=new Array;
            var array1=new Array;

            var checkbox_list=document.getElementsByClassName('search_checkbox');
            var search_selected=document.getElementsByClassName('search_selected');
            // alert(checkbox_list.length);
            j=0;
            for(var i=0;i<checkbox_list.length;i++)
            {
                if(checkbox_list[i].checked)
                {
                    array[j]=checkbox_list[i].value;
                    j++;
                }


            }
            // alert(array);
            s=0;
            for(var k=0;k<search_selected.length;k++)
            {
                if(search_selected[k].selected)
                {
                    array1[s]=search_selected[k].value;
                    s++;
                }

            }
            // alert(array1);
            var array3 = array1.concat(array);
            //alert(array3);

            $.ajaxSetup(
                {
                    'headers':{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
            url ='<?= $url ?>';
            // alert(array3);

            $.ajax({
                url:url,
                type:"POST",
                data:'filter_product='+array3,
                success:function (data)
                {
                  //alert(data);
                    console.log(data);

                    $("#show_product").html(data);
                }
            });
        }
        // $('#select'+'_id').change(function() {
        // });

        $('#state').change(function(){
            url ='<?= $stateUrl ?>';
            var stateId = $('#state').val();
            // alert(stateId);
            $.ajaxSetup(
                {
                    'headers':{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url:url,
                type:"GET",
                data:'stateId='+stateId,
                success:function (data)
                {
                    console.log(data);
                    $("#show_product").html(data);
                }
            });
        });

    </script>
@endsection



