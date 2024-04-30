<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

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
                        <h3>category</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>




        <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Add Category</a>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>                        
                        <th>Name</th>
                        <th>slug</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>


                            <td>        
                                <div class="img-wrapper">
                               <div class="front">
                                   <a href="{{route('shop.produit.details',['slug'=>$category->slug])}}">
                                       <img src="assets/images/fashion/product/front/{{$category->image}}"
                                           class="bg-img blur-up lazyload" style="width: 100px; height: auto;" alt="">
                                   </a>
                               </div>
                              
                              
                           </div></td>
                            {{-- <td><img src="{{ $category->image }}" class="w-20" alt=""></td> --}}

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary bg-primary dropdown-toggle" type="button"
                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        ACTIONS
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="{{ route('category.edit', $category->id) }}" class="dropdown-item">Edit</a>
                                        <a href="javascript:;" data-category_id="{{ $category->id }}"
                                            class="delete-category dropdown-item">Delete</a>
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
        $('body').on('click', '.delete-category', function() {
            var id = $(this).data('category_id');

            Swal.fire({
                title: "Delete",
                text: "Are you sure you want to delete this category?",
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
                    var url = "{{ route('category.destroy', ':id') }}";
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
                            // Remove the deleted category row from the table
                            $('tr[data-category_id="' + id + '"]').remove();

                            // Show success message
                            Swal.fire("Deleted!", "Category has been deleted.", "success")
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
