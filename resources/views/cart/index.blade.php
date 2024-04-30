<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <a href="{{ route('cart.create') }}" class="btn btn-success mb-3">Add Product to Cart</a>

        @if ($itemcarts->count() > 0)
            <table class="table" id="cartTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($itemcarts as $cartItem)
                        <tr id="{{ $cartItem->id }}">
                            <td>{{ $cartItem->product->product_name }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>{{ $cartItem->product->price }} DT</td>
                            <td>{{ $cartItem->product->price * $cartItem->quantity }} DT</td>
                            <td>
                                <a href="javascript:;" data-cartItem_id="{{ $cartItem->id }}"
                                    class="delete-cart-item btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Display the total -->
            <p>Total:
                ${{ $itemcarts->sum(function ($cartItem) {
                    return $cartItem->product->price * $cartItem->quantity;
                }) }}
            </p>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>

    <button id="confirm-cart" class="btn btn-primary">Confirm Cart</button>

    <script>
        $('body').on('click', '.delete-cart-item', function() {
            var id = $(this).data('cartitem_id');


            Swal.fire({
                title: "Delete",
                text: "Are you sure you want to delete this item from the cart?",
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
                    var url = "{{ route('cart.destroy', ':id') }}";
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
                            // Remove the deleted cart item row from the table
                            Swal.fire("Deleted!", "Item has been removed from the cart.",
                                    "success")
                                .then(() => {
                                    var cartItemIdToDelete = id;
                                    var rowToDelete = $('#cartTable').find('tr#' +
                                        cartItemIdToDelete);

                                    if (rowToDelete.length > 0) {
                                        rowToDelete.remove();
                                    } else {
                                        console.log('Row with id ' + cartItemIdToDelete +
                                            ' not found.');
                                    }

                                    // Update the total amount dynamically
                                    var newTotal =
                                        ${{ $itemcarts->sum(function ($cartItem) {
                                            return $cartItem->product->price * $cartItem->quantity;
                                        }) }}
                                    calculateNewTotal
                                        (); // Implement a function to recalculate the total
                                    $('#totalAmount').text('Total: $' + newTotal);

                                    // Refresh the page
                                    location.reload();
                                });
                        }
                    });


                }
            });
        });
        $('#confirm-cart').on('click', function() {
            var confirmCartUrl = "{{ route('confirm-cart') }}";
            Swal.fire({
                title: "Confirm Cart",
                text: "Are you sure you want to confirm the cart and create a command?",
                icon: 'question',
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


                    // AJAX request to confirm cart and create a command
                    $.ajax({
                        type: 'GET',
                        url: confirmCartUrl, // Use the URL from the data attribute


                        success: function(response) {
                            Swal.fire("Cart Confirmed!", "Your command has been created.",
                                "success");

                        },



                    })
                }
            })
        });
    </script>



</x-app-layout>
