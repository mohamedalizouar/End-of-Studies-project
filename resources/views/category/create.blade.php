<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Dashboard') }}
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
                        <h3>ADD Catecory</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('app.index')}}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ADD Catecory</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
          </section>
          
        <div class="container">





            <form action="{{route('category.store') }}" method="post">
                @csrf


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
                    <label for="image" class="form-label">image:</label>
                    <textarea class="form-control" id="image" name="image"></textarea>
                </div>


    
                <div class="form-check ps-0 custome-form-check">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>



                {{-- 11111
                <label for="name">Name:</label>
                <input type="text" name="name" required>
              
                <label for="slug">slug:</label>
                <textarea name="slug"></textarea>
        
                <label for="image">image:</label>
                <input name="image"/>
                <button type="submit">Addcatecory</button>
               
            </form> --}}

            
            
            


        </div>
    </div>
</x-app-layout>