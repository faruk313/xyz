<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Mockery\Exception;

class CategoryController extends Controller
{
    public function add(){

    	return view('admin.addCat');
    }

    public function view(){

    	$categories = Category::all();
    	return view('admin.viewCat',['categories'=>$categories]);
    }
    public function save(Request $request){

    	// return Validator::make($request, [
     //        'categoryName' => 'required|string|max:50',
     //        'categoryDescription' => 'text|max:255',
     //        'categoryStatus' => 'required',
            
     //    ]);

        $this->validate($request,[
            'categoryName' => 'required|string|max:50|unique:categories,catName',
            'categoryDescription' => 'string|max:255',
            'categoryStatus' => 'required',
        ]);

    	$category = new Category();
    	$category->catName = $request->categoryName;
    	$category->catDesc = $request->categoryDescription;
    	$category->catStatus = $request->categoryStatus;
    	$category->save();
    	return redirect('/add-category')->with('msg','Category Added Successfully.');
    	// dd($request->all());
//
//        $category = Category::create([
//            'catName'       => $request->input('categoryName'),
//            'catDesc'       => $request->input('categoryDescription'),
//            'catStatus'     => $request->input('categoryStatus'),
//        ]);
//
//
//        $category = Category::firstOrNew([
//            'catName'       => $request->input('categoryName'),
//            'catDesc'       => $request->input('categoryDescription'),
//            'catStatus'     => $request->input('categoryStatus'),
//        ]);
//
//        $categoey->field_name = "value";
//        $category->save();
//
//        $category = Category::firstOrCreate([
//            'catName'       => $request->input('categoryName'),
//            'catDesc'       => $request->input('categoryDescription'),
//            'catStatus'     => $request->input('categoryStatus'),
//        ])->fill([])->save();

        // firstOrNew() will create a new instance of Model
        // firstOrCreate will return the existing model or create
    }
    public function edit($id){


        try{
            $catID = Category::findOrFail($id);
        }catch (\Exception $e){
            return redirect('/view-category')->with([
                'msg' => 'Category not fount.',
                'status' => false
            ]);
        }
        return view('admin.editCat',['catID'=>$catID]);
    }

    public function update(Request $request){

        $cat = Category::findOrFail($request->catID);

        $this->validate($request,[
            'categoryName' => 'required|string|max:50|unique:categories,catName,'.$cat->id,
            'categoryDescription' => 'string|max:255',
            'categoryStatus' => 'required',
        ]);
        $cat->update([
            'catDesc'   => $request->categoryDescription,
            'catStatus'   => $request->categoryStatus
        ]);



        return redirect('/view-category')->with([
            'msg' => 'Category Updated Successfully.',
            'status' => true
        ]);

    }

    public function del($delID){
        try{
            Category::findOrFail($delID)->delete();

            return redirect('/view-category')->with([
                'msg' => 'Category Updated Successfully.',
                'status' => true
            ]);
        }
        catch(\Exception $e){
            return redirect('/view-category')->with([
                'msg' => 'Category not fount.',
                'status' => false
            ]);
        }
    }
}
