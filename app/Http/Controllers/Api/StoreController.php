<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\store;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use GeneralTrait;
    public function index(Request $request)
    {

        $stores = store::query();
        if ($request->category_id) {
            $stores = $stores->where('category_id', $request->category_id);
        }
        $stores = $stores->latest()->get();
        return $this->sendResponse($stores, 'OK');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // ->select('stores.*','price');
        // $data=DB::table('products')->join('stores','category_id','store_id')
        // $data= product::join('stores', 'stores.id', '=', 'category_id')->get('products.*');
        // return $this->sendResponse($data, 'OK');
        // $data = store::whereHas('category', function ($query) use ) {
        //     $query->where('slug', $slug);
        // })->paginate(5);
        // return $this->sendResponse($data, 'OK');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
            'category_id' => ['required'],
            'details_ar' => ['required', 'max:255'],
            'details_en' => ['required', 'max:255'],
            'product_image' => ['nullable']
        ]);
        if ($validator->fails()) {
            return $this->returnError('validation Error', $validator->errors());
        }
        $stores = store::create($request->all());
        return $this->sendResponse($stores, 'Store Created Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = store::find($id);
        if (!$store)
            return $this->returnError('001', 'هذا المتجر غير موجد');

        return $this->sendResponse($store, 'your store');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //validation
        $store = store::find($id);
        $store->update($request->all());
        return $this->sendResponse($store, 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = product::query();
        $store = $stores->delete($id);
        if ($store) {

            return $this->sendResponse($store, 'deleted');
        } else {
            return $this->returnError('404', 'هذا المتجر غير موجود');
        }
    }
    public function search(Request $request)
    {
        $searchs = store::with('category', 'product');
        // ->where('name',"like","%{$name}%")
        // ->get();
        if ($request->store) {
            $searchs->where('name_ar', "like", "%{$request->store}%")->orWhere('name_en', "like", "%{$request->store}%");
        }

        if($request->category){
            $searchs->whereHas('category',function($query) use($request){
                $query->where('name_ar',"like", "%{$request->category}%")->orWhere('name_en', "like", "%{$request->store}%");
            });
        }
        if($request->product){
            $searchs->whereHas('product',function($query) use($request){
                $query->where('name_ar',"like", "%{$request->product}%")->orWhere('name_en', "like", "%{$request->store}%");
            });
        }
        $search = $searchs->get();
        if (count($search))
            return $this->sendResponse($search, 'Founded');
        return $this->returnError('404', 'Not Founded');
    }
}
