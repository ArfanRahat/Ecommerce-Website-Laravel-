<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product=Product::all();

        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count='';
        }


        return view('home.index',compact('product','count'));
    }
    public function login_home()
    {
        $product=Product::all();

        
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count='';
        }


        return view('home.index',compact('product','count'));
    }
    public function product_details($id)
    {

        $data = Product::find($id);

        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count='';
        }

        return view('home.product_details',compact('data','count'));
    }
    public function add_cart($id)
    {

        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->closeButton(true)->timeOut(5000)->success('Product Added To Cart Successfully');

        return redirect()->back();


        
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id', $userid)->count();
            $cart= Cart::where('user_id', $userid)->get();

        }



        return view('home.mycart',compact('count','cart'));
    }

    public function removeProduct($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('msg', 'Product removed from the cart');
    }


}
