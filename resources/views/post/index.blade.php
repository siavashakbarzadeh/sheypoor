@extends('admin.master')

@section('content')

    <header class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>اگهی ها</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-faded py-4 mb-2">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="input-group" style="direction:ltr !important;">
                        <input type="text" class="form-control" style="direction:rtl;" placeholder="آگهی مورد نظر را جستجو کنید">
                        <span class="input-group-btn">
                            <button class="btn btn-success">جستجو</button>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th class="text-right">ردیف</th>
                            <th class="text-right">عنوان</th>
                            <th class="text-right">دسته</th>
                            <th class="text-right">قیمت</th>
                            <th class="text-right">تاریخ</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($post as $post)
                            @php $v = verta($post->created_at);

                            @endphp
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td >{{ $post->title }}</td>
                                <td > -- </td>
                                <td > {{ number_format($post->price) }} </td>
                                <td >{{  Verta::persianNumbers($v) }}</td>
                                <td>
                                    <a onclick="del_post('{{ $post->id }}','{{ url('admin/post') }}','{{ Session::token() }}')" class="btn btn-danger text-white">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a href="{{ url('admin/post').'/'.$post->id.'/edit' }}" class="btn btn-primary">
                                        <i class="fa fa-pencil text-white"></i>
                                    </a>
                                    <a href="{{ Url('admin/post/filter/'.$post->id) }}" class="btn btn-info"> افزودن فیلتر</a>


                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@stop
<script>
    function del_post(id,url,token)
    {
        if(!confirm('آیا از حذف مطمِنی؟'))
        {
            return false;
        }
        var route= url+'/';
        var form = document.createElement('form');
        form.setAttribute("method","POST");
        form.setAttribute("action",route+id);

        var hiddeninput1 = document.createElement('input');
        hiddeninput1.setAttribute('name','_method');
        hiddeninput1.setAttribute('value','DELETE');
        form.appendChild(hiddeninput1);

        var hiddeninput2 = document.createElement('input');
        hiddeninput2.setAttribute('name','_token');
        hiddeninput2.setAttribute('value',token);
        form.appendChild(hiddeninput2);
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);

        console.log(form);



    }

</script>
