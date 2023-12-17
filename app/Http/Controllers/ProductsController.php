<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
                    ->get();

        return view('backend.pages.products', compact('products'));
    }
    public function create(){
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();


        return view('backend.pages.products-create', compact('categories', 'brands'));
    }
    public function store(Request $request){

        $this->validate($request, [
            "product_name" => "required|unique:products",
            "category_id" => "required",
            "brand_id" => "required"
        ]);


        // dd($request->all());

        DB::table('products')->insert([
            "product_name" => $request->product_name,
            "category_id" => $request->category_id,
            "brand_id" => $request->brand_id
        ]);

        return redirect()->route('dashboard.products')->with("Success", "New Product Created Successfully.");
    }
}
