<?php

namespace App\Http\Controllers\admin;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $categories = category::all();
        return view('category.index',compact('categories'));
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
            $childcat = category::where('parent_id',$value->id)->get();
            foreach ($childcat as $childkey=>$childvalue)
            {
                $category[$childvalue->id]=$value->name.' --> '.$childvalue->name;
            }
        }

        return response()->json($category);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cat = new category($request->all());
       $cat->save();
       return response()->json($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $categories = array();
        $categories[0]="انتخاب سر دسته";
        $cats = category::where('parent_id',0)->get();
        foreach ($cats as $key=>$value)
        {
            $categories[$value->id]=$value->name;
            foreach ($value->getChild as $childkey=>$childvalue)
            {
                $categories[$childvalue->id]=$value->name.' --> '.$childvalue->name;
            }
        }
        return view('category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $category->update($request->all());
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $child1 = $category->getChild;
        if($child1)
        {
            foreach ($child1 as $child1)
            {
                $child2 = $child1->getChild;
               foreach ($child2 as $child2)
               {
                   category::where('id',$child2->id)->delete();
               }
                category::where('id',$child1->id)->delete();
            }
        }
        $category->delete();
        return redirect()->back();
    }
}
