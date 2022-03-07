@extends('Layouts.master')

@section('content')

    <!-- start container -->
    <div class="container">

        <div class="row mt-5">
            <form method="get" action="mainsearch">
            <div class="input-group mb-3">

                    <input type="text" name="search"  class="form-control" placeholder="دنبال چی میگردی؟" >
                    <div class="input-group-prepend">
                        <input class="btn btn-outline-success" type="submit" value="جستجو">
                    </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-10 mt-5">
                <h2>نیازمندیهای رایگان شیپور</h2>
                <p>خرید و فروش خودرو، املاک، آپارتمان، گوشی موبایل، تبلت، لوازم خانگی، لوازم دست دوم، استخدام و هر چه فکر کنید! </p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 mt-4">
                <div class="bg-faded">
                    <div class="row">
                        @foreach($category as $category)
                        <div class="col-md-3 p-4 category">
                            <i class="fa fa-mobile icon-blue" aria-hidden="true"></i>
                            <span>
                                <a href="{{ Url('/cat').'/'.$category->name }}">{{ $category->name }}</a>
                            </span>
                            <div class="d-flex flex-column sub_cat">
                                @foreach($category->getChild as $child)
                                <div class="p-2">
                                    <a href="{{ Url('/subcat').'/'.$category->name.'/'.$child->name }}" style="color: #000; font-size: 14px;">{{ $child->name }}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                            @endforeach



                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <div class="custom-bg-faded">
                        <i class="fa fa-angle-down icon-blue" id="chevron_display" style="margin-right:11px;margin-top:6px;"></i>
                    </div>
                </div>



            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">

                <img src="img/map.png" alt="" usemap="#Map" />
                <map name="Map" id="Map">
                    <area alt="" title="اصفهان" id="esfahan" href="#" shape="poly" coords="176,174,180,173,184,175,188,173,193,171,200,174,207,174,223,182,233,183,242,185,251,185,257,185,263,185,270,186,277,186,277,193,277,198,277,202,275,204,271,206,270,209,268,212,265,215,260,218,256,221,250,222,243,222,237,224,231,225,227,225,222,226,220,229,218,234,218,238,216,246,216,249,215,254,212,256,208,256,200,253,197,252,195,254,191,255,188,256,191,259,193,261,191,268,190,275,188,279,181,272,177,253,171,233,166,226,159,227,153,227,150,226,141,224,138,218" />
                    <area alt="" class="map" title="یزد" id="yazd" href="#" shape="poly" coords="219,255,227,259,230,262,232,271,235,277,240,283,243,291,247,299,256,302,258,292,256,273,264,270,275,270,284,265,283,257,294,251,301,246,304,240,297,230,284,210,279,206" />
                    <area alt="" class="map" title="فارس" id="fars" href="#" shape="poly" coords="189,282,186,284,182,284,177,282,176,286,177,290,175,292,173,293,168,294,166,295,161,295,164,301,171,303,176,306,181,310,186,314,192,326,195,334,204,348,212,362,236,372,264,364,278,356,270,328,256,305" />
                    <area alt="" class="map" title="کرمان" id="kerman" href="#" shape="poly" coords="275,326,283,330,291,329,294,330,297,342,304,347,318,355,332,378,343,392,356,403,359,348,367,305,356,264,311,244,307,243,304,244" />
                    <area alt="" class="map" title="سمنان" id="semnan" href="#" shape="poly" coords="285,184,289,175,295,165,306,155,310,151,315,143,306,129,306,116,298,112,290,103,284,94,278,100,275,110,267,110,257,115,250,118,244,119,237,128,232,134,228,136,220,146,205,150,196,146,195,152,196,160,197,168,196,170" />
                    <area alt="" class="map" title="قم" id="qom" href="#" shape="poly" coords="158,166,168,159,170,154,186,159,191,161,192,166,186,170,182,171,171,173,168,177,161,172" />
                    <area alt="" class="map" title="مرکزی" id="markazi" href="#" shape="poly" coords="136,153,156,141,162,141,168,142,162,159,152,166,148,192,138,194,130,188,130,172" />
                    <area alt="" class="map" title="تهران" id="tehran" href="#" shape="poly" coords="167,139,174,139,177,137,192,132,196,133,201,135,211,136,213,139,218,142,186,153,191,157" />
                    <area alt="" class="map" title="خراسان جنوبی" id="khrasanjonobi" href="#" shape="poly" coords="299,170,306,169,310,164,319,162,326,163,328,167,330,175,332,182,341,187,351,187,372,186,390,191,399,207,399,221,399,228,401,243,404,257,409,266,404,285,404,291,381,282,355,263,322,247,286,218,285,194" />
                    <area alt="" class="map" title="خراسان مرکزی" id="khorasanmarkazi" href="#" shape="poly" coords="309,110,320,110,329,111,335,114,348,110,350,99,342,83,378,98,390,114,414,114,411,138,407,158,402,175,387,184,362,178,342,178,320,154" />
                    <area alt="" class="map" title="خراسان شمالی" id="khorasanshomali" href="#" shape="poly" coords="291,91,296,86,296,78,296,74,299,69,307,66,317,70,320,70,326,74,332,77,334,82,342,95,332,107,299,105" />
                    <area alt="" class="map" title="مازندران" id="mazandaran" href="#" shape="poly" coords="161,111,162,109,173,109,182,114,184,114,207,112,229,110,241,116,250,116,232,125,226,131,200,130,178,126" />
                    <area alt="" class="map" title="گلستان" id="golestan" href="#" shape="poly" coords="243,109,242,96,247,97,258,93,266,86,270,76,282,71,293,73,284,87,275,103,255,114" />
                    <area alt="" class="map" title="آذربایجان غربی" id="azarbayejangharbi" href="#" shape="poly" coords="13,34,21,31,22,22,34,34,39,46,40,59,39,68,40,76,44,90,54,101,62,106,78,106,81,120,58,119,48,123,45,132,35,110,17,76" />
                    <area alt="" class="map" title="آذربایجان شرقی" id="azarbayejansharghi" href="#" shape="poly" coords="48,44,62,48,76,42,86,48,92,61,97,75,110,84,112,97,94,99,82,105,58,94,46,78,46,51" />
                    <area alt="" class="map" title="لرستان" id="lorestan" href="#" shape="poly" coords="98,178,110,185,117,187,129,189,131,191,142,199,139,211,131,218,114,216,99,221,94,214,88,206,85,198" />
                    <area alt="" class="map" title="همدان" id="hamedan" href="#" shape="poly" coords="101,143,118,142,127,142,134,144,138,151,128,161,126,170,125,174,122,186,107,178,104,169,98,170" />
                    <area alt="" class="map" title="قزوین" id="qazvin" href="#" shape="poly" coords="132,111,126,118,135,126,124,134,133,142,145,138,155,130,158,120,156,116" />
                    <area alt="" class="map" title="ایلام" id="ilam" href="#" shape="poly" coords="53,194,61,209,69,221,94,234,101,229,79,207,79,195,59,189" />
                    <area alt="" class="map" title="کرمانشاه" id="kermanshah" href="#" shape="poly" coords="62,153,70,162,85,161,94,158,98,172,88,180,85,186,77,189,64,186,54,186,54,169" />
                    <area alt="" class="map" title="چهار محال بختیاری" id="charmahal" href="#" shape="poly" coords="145,230,151,241,155,251,158,260,170,266,175,255,166,236" />
                    <area alt="" class="map" title="خوزستان" href="#" id="khozestan" shape="poly" coords="94,240,99,248,98,263,114,285,118,290,134,295,138,286,152,282,154,281,152,264,150,258,149,248,136,228,130,224,123,225,115,228" />
                    <area alt="" class="map" title="بوشهر" href="#" id="booshehr" shape="poly" coords="156,298,167,319,183,354,206,362,192,338,183,319,180,310,171,307" />
                    <area alt="" class="map" title="هرمزگان" id="hormozgan" href="#" shape="poly" coords="301,374,314,382,334,411,360,416,350,402,330,384,314,361,287,337,279,338,286,355,280,362,266,369,258,374,246,375,233,380,226,375,242,383,250,386,265,385,278,382,289,378" />
                    <area alt="" class="map" title="سیستان بلوچستان" id="sistan" href="#" shape="poly" coords="380,287,376,304,376,330,375,355,366,394,368,411,386,419,418,428,426,406,431,393,450,387,454,371,445,355,438,342,414,324,408,313,405,288,422,282,426,272,426,266,400,264,417,276,407,284,391,297,382,292,421,265" />
                </map>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-start">
                    <div class="provience-item">
                        <span >همه ایران</span><br>
                        <span class="azarbayejansharghi" >آذربایجان شرقی</span><br>
                        <span class="azarbayejangharbi">آذربایجان غربی</span><br>
                        <span class="ardebil">اردبیل</span><br>
                        <span class="esfahan">اصفهان</span><br>
                        <span class="alborz">البرز</span><br>
                        <span class="ilam">ایلام</span><br>
                        <span class="booshehr">بوشهر</span><br>
                        <span class="tehran">تهران</span><br>
                        <span class="charmahal">چهار محال بختیاری</span><br>
                        <span class="khrasanjonobi">خراسان جنوبی</span><br>
                        <span class="khozestan">خوزستان</span><br>
                        <span class="zanjan">زنجان</span><br>
                        <span class="semnan">سمنان</span><br>
                    </div>
                    <div class="provience-item">
                        <span class="sistan">سیستان بلوچستان</span><br>
                        <span class="fars">فارس</span><br>
                        <span class="qazvin">قزوین</span><br>
                        <span class="qom">قم</span><br>
                        <span class="kordestan">کردستان</span><br>
                        <span class="kerman">کرمان</span><br>
                        <span class="kermanshah">کرمانشاه</span><br>
                        <span class="kohkiloye">کهکیلویه و بویر احمد</span><br>
                        <span class="golestan">گلستان</span><br>
                        <span class="gilan">گیلان</span><br>
                        <span class="lorestan">لرستان</span><br>
                        <span class="mazandaran">مازندران</span><br>
                        <span class="markazi">مرکزی</span><br>
                        <span class="hormozgan">هرمزگان</span><br>
                    </div>

                </div>



            </div>
        </div>

    </div>
    <!-- end container -->


@stop