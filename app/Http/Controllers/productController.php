<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class productController extends Controller
{
    public function index(){

        // return view('products.index',['products'=> Products::latest()->get()]);

        // $products = Products::latest()->get();
        // return view('products.index',['products'=> $products]);

        $products = Products::orderBy('created_at', 'desc')->get();
        return view('products.index', ['products' => $products]);

    } 

    public function add(){
        return view('products/add');
    }

    public function store(Request $request){

        // input fields validation;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:1000000'
        ]);
        // upload image;
        $new_img_name = time()."-".$request->image->extension();
        $request->image->move(public_path('products'), $new_img_name);

        $product = new Products;
        $product->image = $new_img_name;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->withSuccess('New Product Added Successfully');
    }

    public function edit($id){
        $product = Products::where('id', $id)->first();
        return view('products.edit',['product' => $product]);
    }

    public function update(Request $request, $id){

        // input fields validation;
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:jpg,jpeg,png|max:1000000'
        ]);

        $product = Products::where('id', $id)->first();

        if(isset($request->image)){
            // upload image;
            $new_img_name = time()."-".$request->image->extension();
            $request->image->move(public_path('products'), $new_img_name);
            $product->image = $new_img_name;

        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->withSuccess('Product Updted Successfully');

    }

    public function destory($id){
        $product = Products::where('id', $id)->first();
        $product->delete();

        return back()->withSuccess('Product Deleted Successfully');

    }

    public function view($id){
        $product = Products::where('id', $id)->first();
        return view('products.view',['product' => $product]);
    }



}