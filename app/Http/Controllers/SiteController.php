<?php
namespace App\Http\Controllers;

use App\state;
use Illuminate\Http\Request;
use App\category;
use App\post;
use App\filter;
use Illuminate\Support\Facades\DB;
use App\favorite;
use App\Libs\pay;
use App\Search;


class SiteController extends Controller
{
    public function index()
    {
        $category = category::where('parent_id',0)->get();
        return view('site.index',['category'=>$category]);
    }
    public function all()
    {

            $all = post::all();
            return view('site.all',compact('all'));


    }
    public function getPostsOfEachCat($persia_cat)
    {
        $category = category::where('name',$persia_cat)->first();
        $filter=filter::get_search_filter($category->id);

        $post_id= array();
        $get_post_id = DB::table('cat_posts')->where('category_id',$category->id)->get();

        foreach ($get_post_id as $key=>$value)
        {
            $post_id[$value->post_id]=$value->post_id;

        }
        $post = post::whereIn('id',$post_id)->get();
//        die($post);
//        dd($post);
        $state = state::where('parent_id',0)->pluck('state','id');

        return view('site.menu',compact('post','filter','state'));


    }
    public function stateSearch(Request $request)
    {
        $s = state::where('parent_id',$request->stateId)->get();
        foreach ($s as $key=>$value)
        {
            $ss[$value->id]=$value->id;
        }
        $post = post::whereIn('city',$ss)->get();
//        return $post;

        return view('include.post_list',compact('post'));
    }
    public function getPostsOfEachSubcat($persian_cat,$persian_subcat)
    {
        $category = category::where('name',$persian_cat)->first();
        $subcat = category::where(['name'=>$persian_subcat,'parent_id'=>$category->id])->first();


        $post_id = DB::table('cat_posts')->where('category_id',$subcat->id)->pluck('post_id','id')->toArray();

        $post = post::whereIn('id',$post_id)->get();
        return view('site.submenu',compact('post'));

    }
    public function addFavorites(Request $request)
    {

        if($request->has('post_id'))
        {
            $favorites = DB::table('favorites')->insert(['post_id'=>$_POST['post_id'],'user_id'=>$_POST['user_id']]);
            echo $favorites;
        }
    }
    public function myfavorites()
    {
        $user = \Auth::user()->id;
        //dd($user);

       $favorites = \DB::table('favorites')->where('user_id',$user)->get();

        $array = array();
        foreach($favorites as $key=>$value)
        {
            $array[$key] = $value->post_id;
        }

        $Post = DB::table('posts')->orderBy('id','DESC')->whereIn('id',$array)->get();


        return view('site.myfavorites',['favorites'=>$Post]);

    }
    public function delfav(Request $request)
    {
        $user = $request->get('user_id');
        $post = $request->get('post_id');
        $favorites = \DB::table('favorites')->where(['user_id'=>$user,'post_id'=>$post])->delete();
        if($favorites)
        {
            echo 1;
        }

    }
    public function myposts()
    {
        if(\Auth::check())
        {
            $usrid = \Auth::user()->id;

            $myposts = post::where('user_id',$usrid)->get();
            return view('site.myposts',compact('myposts'));
        }else
        {
            return view('Auth.login');
        }
    }
    public function forgetpass()
    {
        return view('site.forgetpass');
    }
    public function SinglePost($slug)
    {
        $SinglePost = Post::whereSlug($slug)->first();
        $cat = Post::get_cat($SinglePost->id);

        $similarPosts = Post::whereHas('categories',function ($query) use ($cat){
                return $query->whereIn('category_id',$cat);
        })->where('id','!=',$SinglePost->id)->limit(6)->get();
//        dd($similarPosts);
        return view('site.single',compact('SinglePost','similarPosts'));
    }
    public function sendnewpass(Request $request)
    {
        $newpass = str_random(8);
        $data =
            [
                'title'=>'کلمه عبور جدید:',
                'content'=>$newpass
            ];
        \Mail::send('mail.sendmail',$data,function ($message){
            $message->to($_POST['email'])->subject('این از طرف سایت شیپور می باشد');
        });

        if(!\Mail::failures())
        {
            $success = "پیام با موفقیت ازسال شد";

        }
        else
        {
            $success = "ایمیل ارسال نشد";

        }
        return view('site.forgetpass',compact('success'));
    }
    public function refreshCaptcha()
    {

        return response()->json(['captcha'=> captcha_img()]);

    }
    public function pay()
    {
        $api="1fd332275376d6e2a0d18c482c9e699b";
        $amount=1000;
        $redirect="http://phpcafe.ir/test.php";

        $result=pay::send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $go = "https://pay.ir/payment/gateway/$result->transId";
            return redirect($go);

        } else {
            echo $result->errorMessage;
        }
    }
    public function ajax_search(Request $request)
    {
        if($request->ajax())
        {
            $filter_product=$request->get('filter_product');
//            die(var_dump($filter_product));


            $array=array();
            $filter_ename=array();

            $e=explode(',',$filter_product);

//            die(var_dump($e));

            foreach ($e as $key=>$value)
            {
                $e2=explode('_',$value);

                if(array_key_exists($e2[0],$filter_ename))
                {
                    $k=$filter_ename[$e2[0]];
                    $s=sizeof($array[$k]);
                    $array[$k][$s]=$e2[1];
                }
                else
                {
                    $array[$e2[0]][0]=$e2[1];
                    $filter_ename[$e2[0]]=$e2[0];

                }


            }
//die(var_dump($array));

            $search=new Search($array);
            $data=$search->get_product();

            return view('include.post_list',['post'=>$data['product']]);


            
        }
    }
    public function mainSearch()
    {
        $keyword = request('search');

        $posts = post::search($keyword)->latest()->get();
        return $posts;
    }

    public function freeRegister()
    {
        $category = category::where('parent_id',0)->get();

        return view('site.freeRegister',compact('category'));
    }
    public function subCatFreeRegister(Request $request)
    {
        $subcat = category::where('parent_id',$request->catid)->get();

        return $subcat;
    }
    public function getNameOfSubCategory(Request $request)
    {
        $name = category::find($request->subcatid);
        return $name;
    }
    public function storePost(Request $request)
    {

        $post = new post($request->all());
        $post->user_id = $request->user_id;

        $cat_id=$request->get('cat_id');



        if ($request->hasFile('img'))
        {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $post->img = $name;

        }
        $post->save();



        DB::table('cat_posts')->insert(['category_id'=>$cat_id,'post_id'=>$post->id]);


        return redirect('freeregister');

    }
}
