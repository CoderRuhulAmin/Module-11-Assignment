<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();

        return view('backend.pages.products', compact('products'));
    }
    public function create(){
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();


        return view('backend.pages.products-create', compact('categories', 'brands'));
    }
    public function store(Request $request){
        dd($request->all);

        $this->validate($request, [
            "product_name" => "required",
            "category_id" => "required",
            "brand_id" => "required"
        ]);



        return redirect('backend.pages.products')->with("Success", "New Product Created Successfully.");
    }
}
