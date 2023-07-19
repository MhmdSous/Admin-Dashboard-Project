@extends('layouts.master')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ session('success') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


    <div class="py-12">
   <div class="container">
    <div class="row">




    <div class="col-md-8">
     <div class="card">
          <div class="card-header"> {{ __('message.edit') }} {{ __('message.categories') }}</div>
          <div class="card-body">



            <form action="{{ url('category/update/'.$categories->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
         <input type="hidden" name="old_image" value="{{ $categories->image }}">
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.categoryName_en') }}</label>
          <input type="text" name="categoryName_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->categoryName_en }}">

                @error('categoryName_en')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.categoryName_ar') }}</label>
          <input type="text" name="categoryName_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->categoryName_ar }}">

                @error('categoryName_ar')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.updateCategoryImage') }}</label>
          <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->image }}">

                @error('image')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>


           <div class="form-group">
           <img src="{{ asset($categories->image) }}" style="width:400px; height:200px;" >

           </div>



        <button type="submit" class="btn btn-primary">{{ __('message.update') }}</button>
             </form>

             </div>

          </div>
        </div>



          </div>
        </div>

          </div>
@endsection
