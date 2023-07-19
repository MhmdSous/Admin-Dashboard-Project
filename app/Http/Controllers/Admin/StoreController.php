<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\category;
use App\Models\product;
use App\Models\store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = DB::table('stores')->whereNull('deleted_at')->latest()->paginate(2);
        $categories=category::all();
        return view('store.index', compact('stores','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image =$request->file('store_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'store_image/store/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);
       store::create([
            'store_image'=>$last_img,
            'name_ar'=>$request->name_ar,
            'details_ar'=>$request->details_ar,
            'name_en'=>$request->name_en,
            'details_en'=>$request->details_en,
            'category_id'=>$request->category_id,
            'created_at'=> Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Store Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = store::find($id);
        $categories=category::all();
        return view('store.edit', compact('stores','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_image = $request->old_image;

        $image =  $request->file('store_image');

        if($image){

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/store/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);
        // unlink($old_image);
         store::find($id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'store_image'=>$last_img,
                ]);
        return redirect()->route('stores')->with('success', 'Store Updated Successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function softdelete($id)
    {
        $delete = store::find($id)->delete();
        return redirect()->back()->with('success', 'Store Soft Deleted Successfully');
    }

    public function search(Request $request){

$name=$request->search_name;
// with('category','product')
  $searchs = store::where('name_ar',"like","%{$name}%")->get();

return view('store.search',compact('searchs'));

 }
}

