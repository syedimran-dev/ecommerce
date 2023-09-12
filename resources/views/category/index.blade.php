<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card py-4">
            <div class="card-title d-flex justify-content-between h-100 align-items-center px-3">
                <h1 class="fw-bold">All Categories</h1>
                <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                        </tr>
                        @endforeach
                     
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
