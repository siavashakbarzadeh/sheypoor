

    <div class="container-fluid mx-5 my-5" >
        @foreach($post as $post)
        <div class="row my-5 ">
            <div class="col-md-2">
                <img src="{{  Url('/images/').'/'."$post->img" }}" width="220" height="180" />
            </div>
        <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2">{{ $post->title }}</div>
                <div class="p-2">تهران</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="p-2">
            <i class="fa fa-star icon-gray" aria-hidden="true"></i>
            </div>
            <div class="p-2">لحظاتی پیش</div>
        </div>
        </div>
        @endforeach
    </div>

