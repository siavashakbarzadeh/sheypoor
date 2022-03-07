<?php

namespace App\Http\Controllers\admin;

use App\category;
use App\filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{

    public function index(Request $request)
    {
        $cat_list=category::get_cat_list();
        $id=$request->get('id');
        $filter=filter::where(['cat_id'=>$id,'parent_id'=>0])->get();
        //$filter=Filter::with('get_child')->where(['cat_id'=>$id,'parent_id'=>0])->get();
        return View('filter.create',compact('cat_list','id','filter'));

    }


    public function create(Request $request)
    {
        $cat_id=$request->get('id');
        $cat=category::findOrFail($cat_id);
        $filter_name=$request->get('filter_name');
        $filter_ename=$request->get('filter_ename');
        $filter_filed=$request->get('filter_filed');
        $filter_child=$request->get('filter_child');

        if(is_array($filter_name))
        {
            foreach ($filter_name as $key=>$value)
            {
                $ename=array_key_exists($key,$filter_ename) ? $filter_ename[$key] : '';
                $filed=array_key_exists($key,$filter_filed) ? $filter_filed[$key] : 1;
                $id=\DB::table('filter')->insertGetId(['cat_id'=>$cat_id,'name'=>$value,'ename'=>$ename,'filed'=>$filed,'parent_id'=>0]);
                if(is_array($filter_child))
                {
                    if(array_key_exists($key,$filter_child))
                    {
                        foreach ($filter_child[$key] as $key2=>$value2)
                        {
                            \DB::table('filter')->insert(['cat_id'=>$cat_id,'name'=>$value2,'filed'=>$filed,'parent_id'=>$id]);
                        }
                    }
                }
            }
        }



    }


    public function update(Request $request, filter $filter)
    {
        //
    }


}
