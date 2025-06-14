<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Category::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->input('category'); // <- Correct
        $category->save();

        toastr()->closeButton(true)->timeOut(5000)->success('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();
        toastr()->closeButton(true)->timeOut(5000)->success('Category Deleted Successfully');
        return redirect()->back();

    }



}
