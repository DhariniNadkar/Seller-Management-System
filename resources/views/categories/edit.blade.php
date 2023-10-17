<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Categories </h2>
              
  <div class="row"></div>
  <div class="col-sm-4"></div>
  
  <form method="POST" action="{{url('category/{category}')}}" enctype="multipart/form-data">
{{-- <form method="POST" action="/category-update/{{$info->id}}" enctype="multipart/form-data"> --}}

    @csrf
    @method('put')
   <label>Title</label>
   <input type="text" name="title" class="form-control" value="{{$info->title}}">
   @if($errors->has('title'))
     <p class="text-danger">{{$errors->first('title')}}</p>
   @endif
   <label>Name</label>
   <input type="text" name="name" class="form-control" value="{{$info->name}}">
   @if($errors->has('name'))
     <p class="text-danger">{{$errors->first('name')}}</p>
   @endif
   <label>Address</label>
   <input type="text" name="address" class="form-control" value="{{$info->address}}">
   @if($errors->has('address'))
     <p class="text-danger">{{$errors->first('address')}}</p>
   @endif
   <label>Contact</label>
   <input type="text" name="contact" class="form-control" value="{{$info->contact}}">
   @if($errors->has('contact'))
     <p class="text-danger">{{$errors->first('contact')}}</p>
   @endif
   <label>Email</label>
   <input type="email" name="email" class="form-control" value="{{$info->email}}">
   @if($errors->has('email'))
     <p class="text-danger">{{$errors->first('email')}}</p>
   @endif
   <label>Product</label>
   <input type="file" name="image" class="form-control" value="{{$info->image}}">
   @if($errors->has('image'))
     <p class="text-danger">{{$errors->first('image')}}</p>
   @endif
   
   <button type="submit" href="{{url('category/{category}')}}">Update</button>
  </form>
</div>

</body>
</html>

</body>
</html>