<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{--{{ __('Dashboard') }}--}}

           <strong>Edit Category</strong>
           
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update.category',$category->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name </label>
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                    <button type="submit" class="btn btn-success mt-3 bg-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
               </div>
            
           </div>
       </div>
    </div>
</x-app-layout>
