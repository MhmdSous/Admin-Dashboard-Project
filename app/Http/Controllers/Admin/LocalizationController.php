<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function lang_change(Request $request)
    {
        $products=product::all();
        $stores=store::all();
        $categories=category::all();
        $users=User::all();
        App::setLocale($request->lang);
          session()->put('locale', $request->lang);

        return view('main',compact('products','stores','categories','users'));
    }
}
