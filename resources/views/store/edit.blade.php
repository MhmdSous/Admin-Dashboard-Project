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
          <div class="card-header"> {{ __('message.edit') }} {{ __('message.stores') }} </div>
          <div class="card-body">



            <form action="{{ url('store/update/'.$stores->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
         <input type="hidden" name="old_image" value="{{ $stores->image }}">
        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.updateName_ar') }}</label>
          <input type="text" required name="name_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $stores->name_ar }}">

                @error('name_ar')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror
        </div>
        <div class="form_group">
            <label for="exampleInputEmail1">{{ __('message.updateName_en') }}</label>
          <input type="text" required name="name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $stores->name_en }}">

                @error('name_en')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.updateStoreDetails_ar') }}</label>
          <input type="text"  name="details_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $stores->details_ar }}">

                @error('details_ar')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror
        </div>
        <div class="form_group">
            <label for="exampleInputEmail1">{{ __('message.updateStoreDetails_en') }}</label>
          <input type="text" name="details_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $stores->details_en }}">

                @error('details_en')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">{{ __('message.update') }} {{ __('message.storeImage') }}</label>
          <input type="file" name="store_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $stores->store_image }}">

                @error('store_image')
                     <span class="text-danger"> {{ $message }}</span>
                @enderror

        </div>


           <div class="form-group">
           <img src="{{ asset($stores->store_image) }}" style="width:400px; height:200px;" >

           </div>



        <button type="submit" class="btn btn-primary">{{ __('message.update') }} </button>
             </form>

             </div>

          </div>
        </div>



          </div>
        </div>

          </div>
@endsection
