<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{--{{ __('Dashboard') }}--}}

           <strong>All Category</strong>
           
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   @endif
                   <table class="table table-bordered table-hover">
                        <thead>
                            <th>SI</th>
                            <th>Category Name</th>
                            <th>User</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user_id}}</td>
                               {{-- <td>{{$category->created_at->diffForHumans()}}</td> --}}
                               <td>{{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                               <td>
                                   <a href="{{route('edit.category',$category->id)}}" class="btn btn-primary">Edit</a>
                                   <a href="{{route('sdelete.category',$category->id)}}" class="btn btn-danger"> Remove </a>
                               </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>
                   {{$categories->links()}}
               </div>
               <div class="col-lg-4">
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">Add Category</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{route('store.category')}}" method="POST">
                               @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="submit" name="submit" class="form-control btn btn-primary bg-primary mt-3" value="create">
                                </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        <div class="container mt-5">
           <div class="row justify-content-center">
               <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Trash List
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>SI</th>
                                    <th>Category Name</th>
                                    <th>User</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($trashCat as $key=>$category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->user_id}}</td>
                                            <td>{{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('restore.category',$category->id)}}" class="btn btn-info">Restore</a>
                                                <a href="{{route('pdelete.category',$category->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>

                            </table>
                          
                        </div>
                    </div>
               </div>
             
           </div>
       </div>
    </div>
</x-app-layout>
