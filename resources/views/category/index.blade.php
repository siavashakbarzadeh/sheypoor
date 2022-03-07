@extends('admin.master')

@section('content')

    <header class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>دسته ها</h1>
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
                <div class="col-md-6">
                    <a href="{{ Url('admin/filter') }}" class="btn btn-info">اضافه کردن فیلتر به دسته ها</a>
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
                            <th>ردیف</th>
                            <th >عنوان</th>
                            <th >دسته</th>
                            <th >تاریخ</th>
                            <th >عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($categories as $cats)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td >{{ $cats->name }}</td>
                            <td >{{ $cats->getParent['name'] }}</td>
                            <td >-</td>
                            <td>
                                <a onclick="del_cat('{{ $cats->id }}','{{ url('admin/category') }}','{{ Session::token() }}')" class="btn btn-danger text-white">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <a href="{{ url('admin/category').'/'.$cats->id.'/edit' }}" class="btn btn-primary">
                                    <i class="fa fa-pencil text-white"></i>
                                </a>


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
    function del_cat(id,url,token)
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
