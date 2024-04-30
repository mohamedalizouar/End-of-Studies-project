@extends('layouts.base')
@section('content')
    <div class="accordion-item category-rating">
        <div class="accordion-item category-rating">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button" type="sbumt" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo">
                    Add Product
                </button>
            </h2>
            

            <div id="collapseTwo" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body category-scroll">

            {{-- <div class="py-12">
                <div class="container"> --}}


                    @csrf

                    <div class="form-check ps-0 custome-form-check">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required>
                </div>
                    <div class="form-check ps-0 custome-form-check">
                    <label for="price">Price:</label>
                    <input type="number" name="price" required>
                </div>
            

                    {{-- <label for="Category">Category:</label>
            <select type="text" name="Category" required> --}}

            </div>

                <div class="form-check ps-0 custome-form-check">
                   


                    


                </div>



                </div>
            </div>
        </div>
            </div>
        {{-- </div>

    </div> --}}

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
