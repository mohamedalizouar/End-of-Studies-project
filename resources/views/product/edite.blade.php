<x-app-layout>
   {{--  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Dashboard') }}
        </h2>
        
    </x-slot> --}}
   {{--  @include('layouts.nav') --}}

    <div class="py-12">

        <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>update</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
          </section>

        <div class="container">
          


           
               
                    <a href="{{route('shop.produit.details',['slug'=>$product->slug])}}">
                        <img src="assets/images/fashion/product/front/{{$product->image}}"
                            class="w-20" alt="">
                    </a>
        
            
           

                    <form action="{{ route('products.update',$product->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="slug" class="form-label">slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$product->slug}}" required >
                        </div>
    
                        <div class="mb-3">
                            <label for="short_description" class="form-label">short_description:</label>
                            <textarea class="form-control" id="short_description" name="short_description" value="{{$product->short_description}}" required ></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="description" class="form-label">description:</label>
                            <textarea class="form-control" id="description" name="description" value="{{$product->description}}" required></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="regular_price" class="form-label">regular_price:</label>
                            <input type="number" class="form-control" id="regular_price " name="regular_price" value="{{$product->regular_price}}" required>
    
                        </div>
    
                        <div class="mb-3">
                            <label for="sale_price" class="form-label">sale_price:</label>
                            <input type="number" class="form-control" id="sale_price" name="sale_price"  value="{{$product->sale_price}}" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="stock_statu" class="form-label">stock_statu:</label>
                            <input type="text" class="form-control" id="stock_statu" name="stock_statu" value="{{$product->stock_statu}} " required>
                        </div>
    
                        <div class="mb-3">
                            <label for="quantity" class="form-label">quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="image" class="form-label">image:</label>
                            <textarea class="form-control" id="image" name="image" value="{{$product->image}}" required></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="images" class="form-label">images:</label>
                            <textarea class="form-control" id="images" name="images" value="{{$product->images}}" required></textarea>
                        </div>
    
                        <div class="mb-3">
    
    
                            <label for="categori" class="form-label">Category:</label>


                            <select name="categori" class="form-control" id="categori" name="categori" value="{{$product->categori}}" required>
                                
                                @foreach ($categories as $category)
                                {{-- <option value="">-- Select Category --</option> --}}
                                    <option value="{{ $category->id }}" @if ($category->id == $product->categories_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
    
                        </div>


                        <div class="mb-3">
    
    
                            <label for="brand" class="form-label">brand:</label>


                            <select name="brand" class="form-control" id="brand" name="brand" value="{{$product->brand}}" required>
                                
                                @foreach ($brands as $brand)
                                {{-- <option value="">-- Select Category --</option> --}}
                                    <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
    
                        </div>
                                            
                        {{-- <div class="mb-3">
                            <label for="brand" class="form-label">Brand:</label>
                            <select name="brand" class="form-control" id="brand" name="brand" required>
                                <option value="">-- Select Brand --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}



                        <div class="form-check ps-0 custome-form-check">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>









        
            {{-- <form  action="{{route('products.update',$product->id)}}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{$product->product_name}}" required>
                <label for="price">Price:</label>
                <input type="number" name="price" value="{{$product->price}}" required>
                <label for="description">Description:</label>
                <textarea name="description">{{$product->description}}</textarea>

                <label for="category">Category:</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                    
                    <option value="{{ $category->id }}" @if ($category->id == $product->categories_id) selected @endif>
                        {{ $category->name }}
                    </option>
                       
                    @endforeach
                </select>

                <label for="image">image:</label>
                <input name="image" value="{{$product->image}}"/>
                
                

                <button type="submit">update</button>
               
            </form> --}}

            
            
            


        </div>
    </div>
</x-app-layout>

