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
          <div class="card-header">  {{ __('message.update') }} {{ __('message.products') }}  </div>
          <div class="card-body">



            <form action="{{ url('product/update/'.$products->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
         <input type="hidden" name="old_image" value="{{ $products->product_image }}">
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.updateName_ar') }}</label>
          <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->name_ar }}">

                @error('name_ar')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.updateName_en') }}</label>
          <input type="text" name="name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->name_en }}">

                @error('name_en')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ __('message.storename') }}</label>
            <input type="number" name="store_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->store_id }}">
            <select class="form-select" aria-label="Default select example" name="store_id">
                <option selected>{{ __('message.selectStore') }} </option>

             @foreach ($stores as $store)
                 <option value="{{ $products->store_id }}">{{ $store->name_ar }}</option>
             @endforeach
             @foreach ($stores as $store)
                 <option value="{{ $products->store_id }}">{{ $store->name_en }}</option>
             @endforeach

           </select>
                  @error('category_id')
                       <span class="text-danger"> {{ $message }}</span>
                  @enderror

          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.update') }} {{ __('message.productDescription_ar') }} </label>
          <input type="text" name="description_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->description_ar }}">

                @error('description_ar')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.update') }} {{ __('message.productDescription_en') }} </label>
          <input type="text"  name="description_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->description_en }}">

                @error('description_en')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">{{ __('message.discount') }}</label>
            <input type="decimal" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->discount }}">

                  @error('discount')
                       <span class="text-danger"> {{ $message }}</span>
                  @enderror

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">{{ __('message.price') }}</label>
            <input type="decimal" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->price }}">

                  @error('price')
                       <span class="text-danger"> {{ $message }}</span>
                  @enderror

          </div>


        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.productImage') }}</label>
          <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->product_image }}">

                @error('product_image')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>


           <div class="form-group">
           <img src="{{ asset($products->product_image) }}" style="width:400px; height:200px;" >

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
