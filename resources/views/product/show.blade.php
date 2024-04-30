<!-- _modal_content.blade.php -->
<div class="row">
    <div class="col-6">
        <strong><label for="name">Name: {{ $product->name }}</label></strong> <br>
        <strong><label for="slug">slug: {{ $product->slug }}</label></strong> <br>
        <strong><label for="short_description">short_description: {{ $product->short_description }}</label></strong> <br>
       
       <strong><label for="regular_price">regular_price: {{ $product->regular_price }}</label></strong><br>
      <strong><label for="description">sale_price: {{ $product->sale_price }}</label></strong><br>
      <strong><label for="description">quantity: {{ $product->quantity }}</label></strong><br>
      <strong><label for="description">stock_status: {{ $product->stock_status }}</label></strong><br>


      <strong><label for="Categori">Category:{{ $product->Categori ? $product->Categori->name : 'N/A' }}</label></strong><br>
      <strong><label for="Brand">Brand: {{ $product->Brand ? $product->Brand->name : 'N/A' }}</label></strong><br>

    </div>
    
    <div class="col-6" class="front">
        <strong>Current image</strong> <br>
        <a herf="{{route('shop.produit.details',['slug'=>$product->slug])}}">
        <img src="assets/images/fashion/product/front/{{$product->image}}" class="w-50" alt="">
        {{-- <div class="front">
            <a href="{{route('shop.produit.details',['slug'=>$product->slug])}}">
                <img src="assets/images/fashion/product/front/{{$product->image}}"
                    class="bg-img blur-up lazyload" alt="">
            </a>
        </div> --}}
    </a>
    </div>
</div>



