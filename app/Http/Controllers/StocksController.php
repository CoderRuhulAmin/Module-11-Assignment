<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    public function index(){
        $stocks = DB::table('product_stocks')
                ->leftJoin('products', 'products.id', '=', 'product_stocks.product_id')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
                ->get();
        

        return view('backend.pages.stocks', compact('stocks'));
    }
    public function create(){
        $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                // ->where('products.category_id', '=', 'categories.id')
                ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
                // ->where('products.brand_id', '=', 'brands.id')
                ->get();

        // dd($products);

        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();

        return view('backend.pages.stocks-create', compact('products', 'categories', 'brands')); 
    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
}
