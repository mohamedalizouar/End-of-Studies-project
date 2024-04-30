
<x-app-layout>  
    
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      
    </x-slot>
        
    
    
        <div class="container">
            <h2>Add Product to Cart</h2>
    
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="product_id">Select Product:</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>

</x-app-layout>
 

