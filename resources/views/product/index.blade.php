<x-app-layout>
    {{-- <x-slot name="header"> 
       <ul>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           
        </h2>
        
    </ul> --}}

    {{-- </x-slot> --}}

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
                        <h3>MY HOME</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">MY HOME</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        
        <a href="{{ route('product.create') }}" class="btn btn-success mb-3">Add product</a>
        <div class="container">
            <table class="table table-responsive " class="table-primary">
                   <thead>
                    <tr>
                        <th>name</th>
                        <th>slug</th>
                        <th>short_description</th>
                        {{-- <th>Description</th> --}}
                        <th>regular_price</th>
                        <th>sale_price</th>
                        {{-- <th>SKU</th> --}}
                          <th>stock_status</th>
                        {{-- <th>featured</th> --}}
                        <th>quantity</th>
                        <th>image</th>
                        {{-- <th>images</th> --}}
                         <th>categori</th>
                          <th>brand</th>




                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($produits as $product)
                        <tr>
                            
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->short_description }}</td>
                             {{-- <td>{{ $product->description }}</td> --}}
                            <td>{{ $product->regular_price }} TND</td>
                              <td>{{ $product->sale_price }} TND</td>
                              
                               {{-- <td>{{ $product-> SKU }}</td> --}}
                            <td>{{ $product->stock_status }}</td>
                            {{-- <td>{{ $product->featured }}</td> --}}
                            <td>{{ $product->quantity }}</td>
                          <td>        
                             <div class="img-wrapper">
                            <div class="front">
                                <a href="{{route('shop.produit.details',['slug'=>$product->slug])}}">
                                    <img src="assets/images/fashion/product/front/{{$product->image}}"
                                        class="bg-img blur-up lazyload"  style="width: 100px; height: auto;" alt="">
                                </a>
                            </div>
                           
                           
                        </div></td>
                        {{-- <td>         
                            <div class="img-wrapper">
                          
                            <div class="back">
                                <a href="{{route('shop.produit.details',['slug'=>$product->slug])}}">
                                    <img src="assets/images/fashion/product/back/{{$product->image}}"
                                        class="bg-img blur-up lazyload" alt="">
                                </a>
                            </div>
                           
                        </div></td> --}}

                        <td>
                            @if ($product->categori_id )
                                {{ $product->name }}
                            @else
                                --
                            @endif
                        </td> 
                        
                              
                     <td>     @if ($product->brand_id)
                          {{ $product->name }}
                        @else
                             --
                         @endif
                        </td>   
                              
                             
                            
                            
                            



                       
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary bg-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ACTIONS
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="{{ route('product.edit', $product->id) }}" class="dropdown-item">Edit</a>
                                        <a href="{{ route('product.show', $product->id) }}" class="dropdown-item show-details" data-toggle="modal" data-target=".bd-example-modal-lg" data-product-id="{{ $product->id }}">Show</a>
                                       
                                        {{-- <a href="javascript:;" class="dropdown-item add-cart" data-product_id="{{ $product->id }}">add panier</a> --}}
                                       
                                        <form action="{{ url("/products/{$product->id}") }}" method="post" >
                                           
                                            <a href="javascript:;" data-product_id="{{ $product->id }}"
                                                class="delete-product dropdown-item">Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
             
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
                </div>
                <div class="modal-body">
                    <div class="py-12">
                        <div class="container">
                            <div id="show"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  

    {{-- <script src="{{ asset('js/show-details.js') }}"></script> --}}
    <script>
    $(document).ready(function() {
        $('.show-details').on('click', function() {
            var id = $(this).data('product-id');
    
            // AJAX request to fetch product details
            $.ajax({
                url: '/products/' + id,
                type: 'GET',
                success: function(response) {
                    // Update modal content with product details
                    $('#show').html(response);
                }
            });
        });
    });
</script>

<script>
    $('body').on('click', '.delete-product', function() {
        var id = $(this).data('product_id');

        Swal.fire({
            title: "Delete",
            text: "Are you sure you want to delete this product?",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "Confirm",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {  
                var url = "{{ route('products.destroy', ':id') }}";
                var token = "{{ csrf_token() }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        // Remove the deleted product row from the table
                        $('tr[data-product_id="' + id + '"]').remove();

                        // Show success message
                        Swal.fire("Deleted!", "product has been deleted.", "success")
                        .then(() => {
                            // Reload the page after deletion 
                            location.reload();
                        });
                    }
                });
            }
        });
    });
</script>





<script>
    $(document).ready(function() {
        // Get the CSRF token value
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('.add-cart').on('click', function() {
            var id = $(this).data('product_id');

            // AJAX request to add product to cart
            $.ajax({
                url: '{{ route('products.addToCart') }}',
                type: 'POST',
                data: {
                    product_id: id
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                },
                error: function(error) {
                    // Handle error response
                    console.log(error);
                }
            });
        });
    });
</script>









</x-app-layout>
