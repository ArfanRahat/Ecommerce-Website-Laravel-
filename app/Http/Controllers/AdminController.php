<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name= $request->category;
        $data->save();
         toastr()->closeButton(true)->timeOut(5000)->success('Category Updated Successfully');
        return redirect('/view_catagory');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {

        $data = new Product;

        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        $data->quantity = $request->input('qty');
        $data->category = $request->input('category');

        // Handle Image
        $image = $request->file('image'); 
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton(true)->timeOut(5000)->success('Product Added Successfully');
        return redirect('/add_product'); // or wherever you wish
    }

    public function view_product()
    {
        $product = Product::paginate(5);
        return view('admin.view_product',compact('product'));

    }
    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
        unlink($image_path);
        }
        $data->delete();
        toastr()->closeButton(true)->timeOut(5000)->success('Product Deleted Successfully');
        return redirect()->back();
        


    }


         



}
