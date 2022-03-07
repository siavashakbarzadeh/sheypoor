<div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addPostModalLabel">افزودن آگهی</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {!! Form::open(['url'=>'admin/post','files'=>true,'id'=>'store_post']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'عنوان آگهی',['class'=>'form-control-label']); !!}
                        {!! Form::text('title',null,['class'=>'form-control','id'=>'title']); !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mycats', 'دسته بندی',['class'=>'form-control-label']); !!}
                        {!! Form::select('cat_id[]',[],null,['class'=>'form-control selectpicker','id'=>'mycats','multiple'=>'multiple']); !!}
                    </div>

                    <div class="form-group bg-faded p-3">
                        <label for="file"></label>
                        {!! Form::label('file', 'آپلود عکس',['class'=>'form-control-label']); !!}
                        {!! Form::file('img', ['class'=>'form-control-file','id'=>'file']) !!}

                        <small class="form-text text-muted">
                            حداکثر 3 مگ
                        </small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'قیمت',['class'=>'form-control-label']); !!}
                        {!! Form::text('price',null,['class'=>'form-control','id'=>'price']); !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'شماره تلفن',['class'=>'form-control-label']); !!}
                        {!! Form::text('phone_number',null,['class'=>'form-control','id'=>'phone_number']); !!}

                    </div>

                    <div class="form-group">
                        {!!  Form::label('state','استان',['class'=>'frm-control-label']) !!}
                        {!! Form::select('state',[],null,['class'=>'form-control','id'=>'state']) !!}
                    </div>

                    <div class="form-group">
                        {!!  Form::label('city','شهر',['class'=>'frm-control-label']) !!}
                        {!! Form::select('city',[],null,['class'=>'form-control','id'=>'city']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', 'آدرس',['class'=>'form-control-label']); !!}
                        {!! Form::textarea('address',null,['rows'=>8,'cols'=>80,'class'=>'form-control','id'=>'address']); !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('editor1', 'محتوا',['class'=>'form-control-label']); !!}
                        {!! Form::textarea('desc',null,['rows'=>8,'cols'=>80,'class'=>'form-control','id'=>'editor1']); !!}
                    </div>


            </div>
            <div class="modal-footer">

                {{ Form::submit('بستن',['class'=>'btn btn-outline-danger ml-2','data-dismiss'=>'modal']) }}
                {{ Form::submit('ثبت آگهی',['class'=>'btn btn-outline-success','data-dismiss'=>'modal','onclick'=>'form_submit()']) }}

                {!! Form::close() !!}



            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker({
        style: 'btn-info'
    });

    function form_submit() {
        document.getElementById("store_post").submit();
    }
</script>

