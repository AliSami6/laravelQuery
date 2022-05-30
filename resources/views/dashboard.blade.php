<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{--{{ __('Dashboard') }}--}}

           Hi..<strong> {{Auth::user()->name}}</strong>
           <strong class="float-end">All Users <span class="badge bg-danger">{{count($users)}}</span></strong>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <table class="table table-bordered table-hover">
                        <thead>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                          
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                 <td>{{$user->created_at->diffForHumans()}}</td>
                                  {{-- use carbon when working with query builder--}}
                                  {{--  <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>--}}
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
