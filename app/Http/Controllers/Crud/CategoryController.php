<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('design.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'category_image'=>'required|mimes:jpeg,png,jpg'
        ]);
        $image = $request->file('category_image')->store('public/files');
        Category::create([
           'category_name'=>$request->category_name,
           'category_slug'=>Str::slug($request->category_name),
           'category_description'=>$request->category_description,
           'category_images'=>$image
        ]);
        notify()->success('Category Created Successfully');
        return redirect()->route('category.show');
    }

    /*
     * Show the Category table
     *
     * @return \Illuminate\Http\Response
     * */
    public function show(){
        $categories = Category::get();
        return view('design.category-table',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $category =  Category::find($id);
        return view('design.category-edit',compact('category'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $category = Category::find($id);
        $filemame = $category->category_images;
        $category->delete();
        Storage::delete($filemame);
        notify()->success('Category is deleted successfully');
        return redirect()->back();
    }
}
