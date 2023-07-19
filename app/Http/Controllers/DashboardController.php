<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = product::all();
        $categories = category::all();
        $stores = store::all();
        $users = User::all();
        
        return view('main', compact('products', 'categories', 'stores','users'));
    }

}
