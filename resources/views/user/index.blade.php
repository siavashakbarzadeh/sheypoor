@extends('admin.master')

@section('content')

    <header class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear ml-3"></i>کاربران</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-faded py-4 mb-2">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="input-group" style="direction:ltr !important;">
                        <input type="text" class="form-control" style="direction:rtl;" placeholder="کاربر مورد نظر را جستجو کنید">
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
                            <th class="text-right" >نام</th>
                            <th class="text-right" >ایمیل</th>
                            <th class="text-right" >نوع کاربر</th>
                            <th class="text-right" >عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($users as $user)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td >{{ $user->name }}</td>
                                <td >{{ $user->email }}</td>
                                <td >-</td>
                                <td>
                                    <a onclick="del_user('{{ $user->id }}','{{ url('admin/user') }}','{{ Session::token() }}')" class="btn btn-danger text-white">
                                        <i class="fa fa-trash-o"></i>
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
    function del_user(id,url,token)
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
