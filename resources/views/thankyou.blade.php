@extends('layouts.base')
@section('content')

<!-- Order Success Section Start -->
<section class="pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="success-icon">
                    <div class="main-container">
                        <div class="check-container">
                            <div class="check-background">
                                <svg viewbox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="check-shadow"></div>
                        </div>
                    </div>

                    <div class="success-contain">
                        <h4>Order Success</h4>
                        <h5 class="font-light">Payment Is Successfully Processsed And Your Order Is On The Way</h5>
                        <h6 class="font-light">Transaction ID:267676GHERT105467</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Order Success Section End -->

<!-- Oder Details Section Start -->
<section class="section-b-space cart-section order-details-table">
    <div class="container">
        <div class="title title1 title-effect mb-1 title-left">
            <h2 class="mb-3">Order </h2>
        </div>

        <div class="cart-media">
            <a href="{{route('card.index')}}">
                <i data-feather="shopping-cart"></i>
                <span id="cart-count" class="label label-theme rounded-pill">
                    {{Cart::instance('card')->content()->count()}}
                </span>
            </a>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="col-sm-12 table-responsive">
                    <table class="table cart-table table-borderless">
                        <tbody>
                            <tr class="table-order">
                                {{-- <td>
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/fashion/product/front/1.jpg" class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                </td> --}}
                                {{-- <td>
                                    <p>Product Name</p>
                                    <h5> 
                                        <span>
                                           
                                        
                                    </h5>
                                </td> --}}
                               

{{--                                  
                                <td>
                                    <p>Quantity</p>
                                    <h5>1</h5>
                                </td>
                                <td>
                                    <p>Price</p>
                                    <h5>$63.54</h5>
                                </td>
                            </tr> --}}

                            {{-- <tr class="table-order">
                                <td>
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/fashion/product/front/2.jpg" class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                </td>
                                <td>
                                    <p class="font-light">Product Name</p>
                                    <h5>Jacket & Cap</h5>
                                </td>
                                <td>
                                    <p class="font-light">Quantity</p>
                                    <h5>5</h5>
                                </td>
                                <td>
                                    <p class="font-light">Price</p>
                                    <h5>$57.10</h5>
                                </td>
                            </tr> --}}

                            {{-- <tr class="table-order">
                                <td>
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/fashion/product/front/3.jpg" class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                </td>
                                <td>
                                    <p class="font-light">Product Name</p>
                                    <h5>New Fashion</h5>
                                </td>
                                <td>
                                    <p class="font-light">Quantity</p>
                                    <h5>1</h5>
                                </td>
                                <td>
                                    <p class="font-light">Price</p>
                                    <h5>$63.25</h5>
                                </td>
                            </tr> --}}
                        </tbody>
                        <tfoot>
                            <tr class="table-order">
                                <td colspan="3">
                                    <h5 class="font-light">Subtotal :</h5>
                                </td>
                                <td>
                                    <h4>
                                        <a href="{{route('card.index')}}">
                                            <span>{{cart::instance('card')->subtotal()}} TND </span>
                                           </a>
                                    </h4>
                                </td>
                            </tr>

                            {{-- <tr class="table-order">
                                <td colspan="3">
                                    <h5 class="font-light">Shipping :</h5>
                                </td>
                                <td>
                                    <h4>$12.00</h4>
                                </td>
                            </tr> --}}

                            <tr class="table-order">
                                {{-- <td colspan="3">
                                    <h5 class="font-light">Tax(GST) :</h5>
                                </td>
                                <td>
                                    <h4>$10.00</h4>
                                </td> --}}


                                



                                  <td colspan="3">
                                    <h5 class="font-light">Tax(GST) :</h5>
                                </td>
                                <td>
                                    <h4> 
                                        <a href="{{route('card.index')}}">
                                        
                                        {{cart::instance('card')->tax()}} TND </h4>
                                </td>

                               

                        
                        </li>

                            

                            <tr class="table-order">
                                <td colspan="3">
                                    <h4 class="theme-color fw-bold">Total Price :</h4>
                                </td>
                                <td>
                                    <h4 class="theme-color fw-bold"><a href="{{route('card.index')}}">
                                        <span>{{cart::instance('card')->total()}} TND </span>
                                       </a>
                                    </h4>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="order-success">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-details">
                                <li>Order ID: 267676</li>
                                {{-- <li> {{$produit->created_at}}</li>
                                <li>Order Total: $907.28</li> --}}
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h4>shipping address</h4>
                            <ul class="order-details">
                                <li>MALL</li>
                                <li>3000, SFAX.</li>
                                <li>TUNISIA, 235153 Contact No. 48465465465</li>
                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="payment-mode">
                                <h4>payment method</h4>
                                <p>Cash on delivery (COD) available. 
                                    acceptance subject to device availability.</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery: <span>2024</span></h3>
                                {{-- <a href="order-tracking.php">track order</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Order Details Section End -->

 <!-- Subscribe Section Start -->
 <section class="subscribe-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="subscribe-details">
                    <h2 class="mb-3">Subscribe Our News</h2>
                    <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                        and fantastic Products.</h6>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                <div class="subsribe-input">
                    <div class="input-group">
                        <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                        <button class="btn btn-solid-default" type="button">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
