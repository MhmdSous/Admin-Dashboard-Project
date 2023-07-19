<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use App\Models\store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Billable;
use Laravel\Cashier\PaymentMethod;


class productApiController extends Controller
{
    use GeneralTrait;
use Billable;
    public function index(Request $request)
    {
        $products = product::query();
        if ($request->store_id) {
            $products = $products->where('store_id', $request->store_id);
        }
        $products = product::latest()->get();
        return $this->sendResponse($products, 'OK');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
            'store_id' => ['required'],
            'price' => ['numeric', 'required'],
            'discount' => ['numeric', 'required'],
            'description_ar'=>['max|255','nullable'],
            'description_en'=>['max|255','nullable'],
            'product_image' => ['nullable']
        ]);
        if ($validator->fails()) {
            return $this->returnError('validation Error', $validator->errors());
        }
        $products = product::create($request->all());
        return $this->sendResponse($products, 'Created Successfuly!');
    }
    public function show($id)
    {
        $product = product::find($id);
        if (!$product)
            return $this->returnError('001', 'هذا المنتج غير موجد');

        return $this->sendResponse($product, 'your product');
    }
    public function update($id, Request $request)
    {
        //validation
        $product = product::find($id);
        $product->update($request->all());
        return $this->sendResponse($product, ',');
    }
    public function destroy($id)
    {
        $products=product::query();
        $product=$products->delete($id);

        if ($product) {

            return $this->sendResponse($product, 'deleted');
        } else {
            return $this->returnError('404', 'هذا المنتج غير موجود');
        }
    }
    public function search($name){
        $search=product:: with('category','stores','review')
        ->where('name_ar',"like","%".$name."%")
        ->orWhere('name_en',"like","%".$name."%")
        ->get();

        if(count($search))
       return $this->sendResponse($search,'Founded');
       return $this->returnError('404','Not Founded');

    }
    public function SingleCharge(Request $request){
$amount=$request->amount;
$PaymentMethod=$request->paymentMethodId;
$user=auth()->user();

 $var =$request->user()->charge(100, $request->paymentMethodId);
 return $this->sendResponse($var,'yes');

    }
}
