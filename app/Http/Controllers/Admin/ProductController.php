<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\product;
use App\Models\store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->whereNull('deleted_at')->latest()->paginate(2);
        $stores = store::all();
        return view('product.index', compact('products', 'stores'));
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


        if ($request->discount == null || $request->price == null) :
            $request->request->add(['discount' => 0, 'price' => 0]);
        endif;

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/product/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);

        product::create([
            'name_ar' => $request->product_name_ar,
            'name_en' => $request->product_name_en,
            'product_image' => $last_img,
            'store_id' => $request->store_id,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'discount' => $request->discount,
            'price' => $request->price,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', __('message.InsertSuccess'));
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
        $stores = store::all();
        $products = product::find($id);
        return view('product.edit', compact('products', 'stores'));
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

        $image =  $request->file('product_image');

        if ($image) {

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/product/';
            $last_img = $up_location . $img_name;
            $image->move($up_location, $img_name);
            // unlink($old_image);
            product::find($id)->update([
                'name_ar' => $request->product_name_ar,
                'name_en' => $request->product_name_en,
                'product_image' => $last_img,
                'store_id' => $request->store_id,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'discount' => $request->discount,
                'price' => $request->price,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('product')->with('success', __('message.UpdateSuccess'));
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
        $delete = product::find($id)->delete();
        return redirect()->back()->with('success', __('message.deleteSuccess'));
    }
    public function softdelete($id)
    {
        $delete = product::find($id)->delete();
        return redirect()->back()->with('success', __('message.deleteSuccess'));
    }
}
