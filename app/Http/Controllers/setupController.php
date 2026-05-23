<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use function Laravel\Prompts\adjustVisibleWindow;

class setupController extends Controller
{
    public function category(){
        $category=Category::all();
        return view('setup.category',compact('category'));
    }
    public function categoryCreate(Request $request){
        $request->validate([
            'category_name'         => 'required|unique:categories,category_name'
        ],['category_name.required' => 'Please Input Category Name.',
            'category_name.unique'  => 'Category already exists.'
        ]);

        $category=new Category();
        $category->category_name    =$request->category_name;
        $category->status           =$request->status;
        $category->save();
        return redirect()->back()->with('success','Successfully Category Added');
    }

    public function editCategory($category_id){
        $category=Category::all();
        $editCategory=Category::findOrFail($category_id);
        return view('setup.category',compact('category','editCategory'));

    }

    public function categoryUpdate(Request $request,$category_id){
        $category=Category::findOrFail($category_id);
        $category->category_name=$request->category_name;
        $category->status=$request->status;
        $category->save();
        return redirect()
            ->route('setup.category')
            ->with('updated','Successfully Category Updated');
    }



    public function categoryDelete(Request $request,$category_id){
        $category=Category::findOrFail($category_id);
        $category->delete();
        return redirect()->back()->with('delete','Successfully Category Deleted');
    }

    public function product(){
        return view('setup.product');
    }

}
