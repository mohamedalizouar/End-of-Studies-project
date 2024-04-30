<x-app-layout>




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
                        <h3>ADD PRODUIT</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ADD PRODUIT</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
           


           
               
        
            
           

                    <form action="{{ url('/products/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">short_description:</label>
                            <textarea class="form-control" id="short_description" name="short_description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="regular_price" class="form-label">regular_price:</label>
                            <input type="number" class="form-control" id="regular_price " name="regular_price"
                                required>

                        </div>

                        <div class="mb-3">
                            <label for="sale_price" class="form-label">sale_price:</label>
                            <input type="number" class="form-control" id="sale_price" name="sale_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="stock_statu" class="form-label">stock_statu:</label>
                            <input type="text" class="form-control" id="stock_statu" name="stock_statu">
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image:</label>
                            <textarea class="form-control" id="image" name="image"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">images:</label>
                            <textarea class="form-control" id="images" name="images"></textarea>
                        </div>

                        <div class="mb-3">


                            <label for="categori" class="form-label">Category:</label>
                            <select name="categori" class="form-control" id="categori" name="categori" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categoris as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand:</label>
                            <select name="brand" class="form-control" id="brand" name="brand" required>
                                <option value="">-- Select Brand --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                                            
                       



                        <div class="form-check ps-0 custome-form-check">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
            
            
            


        </div>
    </div>







</x-app-layout>








{{-- <x-app-layout>


    <div class="py-12">
        <div class="container">
            <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body category-scroll">
                    <form action="{{ url('/products/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">short_description:</label>
                            <textarea class="form-control" id="short_description" name="short_description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="regular_price" class="form-label">regular_price:</label>
                            <input type="number" class="form-control" id="regular_price " name="regular_price"
                                required>

                        </div>

                        <div class="mb-3">
                            <label for="sale_price" class="form-label">sale_price:</label>
                            <input type="number" class="form-control" id="sale_price" name="sale_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="stock_statu" class="form-label">stock_statu:</label>
                            <input type="text" class="form-control" id="stock_statu" name="stock_statu">
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image:</label>
                            <textarea class="form-control" id="image" name="image"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">images:</label>
                            <textarea class="form-control" id="images" name="images"></textarea>
                        </div>

                        <div class="mb-3">


                            <label for="categori" class="form-label">Category:</label>
                            <select name="categori" class="form-control" id="categori" name="categori" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categoris as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand:</label>
                            <select name="brand" class="form-control" id="brand" name="brand" required>
                                <option value="">-- Select Brand --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check ps-0 custome-form-check">
                            <button type="submit" class="btn btn-primary">ADD Produit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





</x-app-layout> --}}

















{{-- @extends('layouts.base')
@section('content')

@endsection --}}













{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Dashboard' }}
        </h2>
    </x-slot> --}}



{{-- @extends('layouts.base')
@section('content')
    <div class="py-12">
        <div class="container">

            <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body category-scroll">




                    <form action="{{ url('/products/store') }}" method="post">

                        @csrf

                        <form>


                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name">
                                <div id="name" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">slug:</label>
                                <input type="text" class="form-control" id="slug">
                            </div>

                            <div class="mb-3">
                                <label for="short_description" class="form-label">short_description:</label>
                                <textarea class="form-control" id="short_description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">description:</label>
                                <textarea class="form-control" id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="regular_price" class="form-label">regular_price:</label>
                                <input type="number" class="form-control" id="regular_price " required>

                            </div>

                            <div class="mb-3">
                                <label for="sale_price" class="form-label">sale_price:</label>
                                <input type="number" class="form-control" id="sale_price" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock_statu" class="form-label">stock_statu:</label>
                                <input type="text" class="form-control" id="stock_statu">
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">quantity:</label>
                                <input type="number" class="form-control" id="quantity" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">image:</label>
                                <textarea class="form-control" id="image"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">images:</label>
                                <textarea class="form-control" id="images"></textarea>
                            </div>

                            <div class="mb-3">


                                <label for="categori" class="form-label">Category:</label>
                                <select name="categori" class="form-control" id="categori" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categoris as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="mb-3 ">



                                <label for="brand" class="form-label">brand:</label>
                                <select name="brand" class="form-control" id="brand" required>
                                    <option value="">-- Select brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>





                            <div class="form-check ps-0 custome-form-check" >
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>


                        </form>

                </div>
                </form>
            </div>










        </div>

    </div>



    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="subscribe-details">
                                    <h2 class="mb-3">Subscribe Our News</h2>
                                    <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our
                                        fresh
                                        and fantastic Products.</h6>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                                <div class="subsribe-input">
                                    <div class="input-group">
                                        <input type="text" class="form-control subscribe-input"
                                            placeholder="Your Email Address">
                                        <button class="btn btn-solid-default" type="button">Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 

             @endsection --}}









{{-- <li>
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" required>
                                    </li>
                                    <li>
                                        <label for="slug">Slug:</label>
                                        <input type="text" name="slug">
                                    </li> --}}
{{-- <li>
                                        <label for="short_description">Short Description:</label>
                                        <textarea name="short_description"></textarea>
                                    </li> --}}

{{-- <li>
                                        <label for="description">Description:</label>
                                        <textarea name="description"></textarea>
                                    </li>
                                    <br>  <br> --}}
{{-- <li>
                                        <label for="regular_price">regular_price:</label>
                                        <input type="number" name="regular_price" required> 
                                    </li>                               --}}

{{-- <li>
                                        <label for="sale_price">sale_pricee:</label>
                                        <input type="number" name="sale_price" required> 
                                    </li>     --}}



{{-- <li>
    
    
                                        <div class="form-check ps-0 custome-form-check">
                                            <label for="stock_statu">stock_statu:</label>
                                            <input type="number" name="stock_statu" required>
    
                                   
    
                                    </li> --}}



{{-- <li>
                                        <label for="quantity">quantity:</label>
                                        <input type="number" name="quantity" required> 
                                    </li>                              
                                    <br><br> --}}



{{-- <li>
    
    
                                        
                                            <label for=" image"> image:</label>
                                            <textarea name=" image"></textarea>
                                        
                                    </li>  --}}


{{-- <li>
                                    
                                        <label for=" images"> images:</label>
                                        <textarea name=" images"></textarea>
                                    
                                    </li>
    
                                    <li>
                                        <label for="categori">Category:</label>
                                        <select name="categori" id="categori" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categoris as $category)   
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </li> --}}


{{-- <li>
                                        <label for="brand">brand:</label>
                                        <select name="brand" id="brand" required>
                                            <option value="">-- Select brand --</option>
                                            @foreach ($brands as $brand)   
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </li> --}}
{{-- <li>
                                        <label for="brand">brand:</label>
                                        <input type="text" name="brand" required>
                                    </li> --}}





{{-- <div class="form-check ps-0 custome-form-check">
                    <label for="Categoi">Category:</label>
                    
                </li></div> --}}

{{-- <div class="form-check ps-0 custome-form-check">
    
                <li>
                    <label for="image">image:</label>
                    <input name="image" />
                </div> --}}
{{-- </x-app-layout> --}}
