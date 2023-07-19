<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use GeneralTrait;

    public function index()
    {
        
        $categories = category::latest()->get();
        return $this->sendResponse($categories, 'OK');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $categories = category::create($request->all());
        return $this->sendResponse($categories, 'Created Successfuly!');
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
            'image' => ['nullable']
        ]);
        if ($validator->fails()) {
            return $this->returnError('validation Error', $validator->errors());
        }
        $categories = category::create($request->all());
        return $this->sendResponse($categories, 'Created Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::find($id);
        if (!$category)
            return $this->returnError('001', 'هذا القسم غير موجد');

        return $this->sendResponse($category, 'your category');
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
        $category = category::find($id);
        $category->update($request->all());
        return $this->sendResponse($category, ',');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categories = category::query();
        $category = $categories->delete($id);
        if ($category) {

            return $this->sendResponse($category, 'deleted');
        } else {
            return $this->returnError('404', 'هذا القسم غير موجود');
        }
    }
    public function search(Request $request)
    {
        // $name=$request->get('name');
        // $search = category::with('stores')
        //     ->where('name', "like","%{$name}%")
        //     ->get();
        // if (count($search))
        //     return $this->sendResponse($search, 'Founded');
        // return $this->returnError('404', 'Not Founded');
        $searchs=category:: with('stores');
        if($request->category){
            $searchs->where('name_ar',"like","%{$request->category}%")
            ->orWhere('name_en',"like","%{$request->category}%");
        }
        $search=$searchs->get();
                if($search)
               return $this->sendResponse($search,'Founded');
               return $this->returnError('404','Not Founded');

    }
}
