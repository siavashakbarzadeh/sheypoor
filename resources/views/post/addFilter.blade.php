@extends('admin.master')

@section('content')
    <header class="py-3 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5> افزودن فیلتر به آگهی: {{ $post->title }}</h5>
                </div>
            </div>
        </div>
    </header>
    @php
    function get_active($filter_value,$key1,$key2)
    {
        $k=$key1.'_'.$key2;
        //var_dump($k);
        if(array_key_exists($k,$filter_value))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    @endphp
    <section>
        {!! Form::open(['url'=>'admin/product/add_filter']) !!}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        @foreach($filters as $key=>$value)
                        <div class="p-2" style="color: red;">{{ $value->name }}</div>
                                @if($value->filed==1)
                                    <select name="filter[<?= $value->id ?>]" class="form-control" id="select" style="width: 150px !important;" >
                                        <option value="">...</option>
                                        @foreach($value->get_child as $key2=>$value2)
                                            <option @if(get_active($filter_value,$value->id,$value2->id)) selected="selected" @endif
                                             value="{{ $value2->id }}">{{ $value2->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                <div class="d-flex flex-column">
                                    <div class="p-2">
                                    @foreach($value->get_child as $child)
                                    <input @if(get_active($filter_value,$value->id,$child->id)) checked="checked" @endif
                                    name="filters[<?= $value->id ?>][<?= $child->id ?>]" value="<?= $child->id ?>"type="checkbox" class="search_checkbox"  />
                                    {{ $child->name }}
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
        </div>
        {{ Form::close() }}
    </section>




@stop