<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$user=User::all();
        return view('layouts.master',compact('user'));
    }
    public function indexProducts()
    {
         $products=product::all();
        return view('product.index',compact('products'));
    }
    public function indexCategories()
    {
    $categories=category::all();
        return view('layouts.admin.categories',compact('categories'));
    }
    public function indexStores()
    {

    $stores=store::all();
        return view('layouts.admin.stores',compact('stores'));
    }
    // public function main()
    // {
    //     $products=product::all()->count();
    //     return view('main',compact('products'))
    //     ->with('products_count' , product::all()->count() )
    //     ->with('store_count' , store::all()->count() )
    //     ->with('users_count' , User::all()->count())
    //     ->with('categories_count' , category::all()->count())
    //    ->with('trashed_count' , product::onlyTrashed()->get()->count())  ;
    // }
}
