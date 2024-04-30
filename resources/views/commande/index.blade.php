<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Items</th>
                        <th>totale</th>

                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->items->count() }} </td>
                            <td>{{ $c->totale }} DT</td>

                            <td>{{ $c->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary bg-primary dropdown-toggle" type="button"
                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        ACTIONS
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="{{ route('commandes.showutili', $c->id) }}"
                                            class="dropdown-item">Show</a>


                                        <form action="{{ url("/commandes/{$c->id}") }}" method="post">

                                            <a href="javascript:;" data-c_id="{{ $c->id }}"
                                                class="delete-C dropdown-item">Delete</a>
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




    <script>
        $(document).ready(function() {
            $('.show-details').on('click', function() {
                var id = $(this).data('c_id');

                // AJAX request to fetch command details
                $.ajax({
                    url: '/commandes/' +
                        id, // Assuming you have a route for fetching command details
                    type: 'GET',
                    success: function(response) {

                        // Update modal content with command details
                        $('#show').html(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });

        $('body').on('click', '.delete-C', function() {
            var id = $(this).data('c_id');

            Swal.fire({
                title: "Delete",
                text: "Are you sure you want to delete this commande?",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('commandes.destroy', ':id') }}";
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
                            // Remove the deleted command row from the table
                            $('tr[data-c_id="' + id + '"]').remove();

                            // Show success message
                            Swal.fire("Deleted!", "commande has been deleted.", "success")
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

</x-app-layout>
