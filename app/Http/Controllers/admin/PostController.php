<?php

namespace App\Http\Controllers\admin;

use App\post;
use App\filter;
use App\state;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('post/index',array('post'=>$posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = array();
        $category[0]="انتخاب سر دسته";
        $cats = category::where('parent_id',0)->get();
        foreach ($cats as $key=>$value)
        {
            $category[$value->id]=$value->name;
            foreach ($value->getChild as $childkey=>$childvalue)
            {
                $category[$childvalue->id]=$value->name.' --> '.$childvalue->name;
                foreach ($childvalue->getChild as $child2key=>$child2value)
                {
                    $category[$child2value->id]=$value->name.' --> '.$childvalue->name.'--->'.$child2value->name;
                }
            }
        }
        $state[0]="انتخاب استان";
        $st = state::where('parent_id',0)->get();
        foreach ($st as $key2=>$value2)
        {
            $state[$value2->id]=$value2->state;
        }

        return response()->json([$category,$state]);
    }
    public function getCity(Request $request)
    {
        $state = state::where('parent_id',$request->state)->get();
        foreach ($state as $key=>$value)
        {
            $cities[$value->id]=$value->city;
        }
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required',
            'cat_id'=>'required',
            'desc'=>'required'
        ],[
            'title.required'=>'عنوان حتما باید وارد شود',
            'cat_id.required'=>'حداقل یک دسته انتخاب کنید',
            'desc.required'=>'فیلد محتوا حتما باید وارد شود'
        ]);

        $post = new post($request->all());

        $cat_id=$request->get('cat_id');


        if ($request->hasFile('img'))
        {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $post->img = $name;

        }
        $post->city = $request->city;
        $post->save();
        //dd(is_array($cat_id));
//        if(is_array($cat_id))
//        {
//            dd('hi');
            foreach ($cat_id as $key=>$value)
            {

                DB::table('cat_posts')->insert(['category_id'=>$value,'post_id'=>$post->id]);
            }
//        }
        return redirect('admin/post');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $post_cat = post::get_cat($post->id);
        $category = array();
        $category[0]="انتخاب سر دسته";
        $cats = category::where('parent_id',0)->get();
        foreach ($cats as $key=>$value)
        {
            $category[$value->id]=$value->name;
            foreach ($value->getChild as $childkey=>$childvalue)
            {
                $category[$childvalue->id]=$value->name.' --> '.$childvalue->name;
                foreach ($childvalue->getChild as $child2key=>$child2value)
                {
                    $category[$child2value->id]=$value->name.' --> '.$childvalue->name.'--->'.$child2value->name;
                }
            }
        }
        return view('post.edit',['post'=>$post,'post_cat'=>$post_cat,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

        DB::table('cat_posts')->where('post_id',$post->id)->delete();
        $cat=$request->get('cat_id');
        if(is_array($cat))
        {
            foreach ($cat as $key=>$value)
            {
                DB::table('cat_posts')->insert(['post_id'=>$post->id,'cat_id'=>$value]);
            }
        }
        if ($request->hasFile('img'))
        {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $post->img = $name;

        }
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->phone_number = $request->phone_number;


        $post->save();




        $url='admin/post/'.$post->id.'/edit';
        return redirect($url);






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        DB::table('cat_posts')->where('post_id',$post->id)->delete();
        $post->delete();
        return redirect()->back();
    }
    public function add_filter_form($id)
    {
        $filter_value=filter::get_value($id);
        $post=post::findOrFail($id);
        $filters=filter::get_post_filter($id);
//        dd($filters);
        return View('post.addFilter',['filters'=>$filters,'post'=>$post,'filter_value'=>$filter_value]);
    }
    public function add_filter_post(Request $request)
    {
        //dd($request->all());
        $post_id=$request->get('post_id');
        $filter=$request->get('filter');
        $filters=$request->get('filters');
//        dd($filter);

        if(is_array($filter))
        {
            DB::table('filter_post')->where(['product'=>$post_id])->delete();
            foreach ($filter as $key=>$value)
            {

                DB::table('filter_post')->insert(
                    [
                        'product'=>$post_id,
                        'filter_id'=>$key,
                        'value'=>$value
                    ]
                );
            }
        }
        if(is_array($filters))
        {
            foreach ($filters as $key=>$value)
            {
                foreach ($value as $key2=>$value2)
                {
//                    dd($value2);
                    DB::table('filter_post')->insert(
                        [
                            'product'=>$post_id,
                            'filter_id'=>$key,
                            'value'=>$value2
                        ]
                    );
                }
            }
        }

        return redirect()->back();


    }
}
