<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->get();
        return view('admin.category.index',compact('categories','trashCat'));
    }
    public function AddCat(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|unique:categories|max:55'
        ],
        [
            'category_name.required'=> 'Please input category name',
            'category_name.max'=>'Category Name Less Than 55 Charaters'
        ]);
        //insert data with orm
       // Category::insert([
       //     'category_name'=> $request->category_name,
       //     'user_id'=>Auth::user()->id,
       //     'created_at'=>Carbon::now()
       // ]);
       $category = new Category();
       $category->category_name = $request->category_name;
       $category->user_id = Auth::user()->id;
       $category->save();

       // insert data with query builder

       //$data = array();
       //$data['category_name'] = $request->category_name;
       //$data['user_id'] = Auth::user()->id;
       //DB::table('categories')->insert($data);
        return redirect()->back()->with('success', ' Category inserted  succesfully');
    }

    public function Edit($id)
    {
        // query builder
        //$categories = DB::table('categories')->where('id',$id)->first();

        //eloquent orm
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }
    public function Update(Request $request,$id)
    {
        //$data = array();
        //$data['category_name'] = $request->category_name;
        //$data['user_id'] = Auth::user()->id;
        //DB::table('categories')->update($data);
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('all.category')->with('success',' Category Updated Successfully');
    }
    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();
        return redirect()->back()->with('success',' Category Removed Successfully');
    }
    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success',' Category Resotred Successfully');
    }
    public function PDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success',' Category Deleted Successfully');
    }
}
