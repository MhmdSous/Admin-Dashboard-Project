<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::latest()->paginate(4);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {


        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/category/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);

        category::create([
            'categoryName_en'=>$request->categoryName_en,
            'categoryName_ar'=>$request->categoryName_ar,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Category Inserted Successfully');
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
        $categories = category::find($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id )
    {

        $old_image = $request->old_image;

        $image =  $request->file('image');

        if ($image) {

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/category/';
            $last_img = $up_location . $img_name;
            $image->move($up_location, $img_name);
            unlink($old_image);
            $update = category::find($id)->update([
                'categoryName_en'=>$request->categoryName_en,
                'categoryName_ar'=>$request->categoryName_ar,
                'image' => $last_img,
                'id' => $request->id
            ]);

            return redirect()->route('categories')->with('success', 'Categoery Inserted Successfully');
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
        $delete = category::find($id)->delete();
        return redirect()->back()->with('success', 'Categoery Soft Deleted Successfully');
    }
}
