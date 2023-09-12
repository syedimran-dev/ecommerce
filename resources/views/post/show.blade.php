<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <img src="{{"/storage/$post->image"}}" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <h1 class="display-5 text-danger">Title</h1>
                <h1 class="display-3">{{$post->name}}</h1>
                <h1 class="display-5 text-danger">description</h1>
                <h2 class="display-3">{{$post->description}}</h2>
                <h1 class="display-5 text-danger">Category</h1>
                <h2 class="display-3">{{$post->category->name}}</h2>
                <h1 class="display-5 text-danger">Price</h1>
                <p>{{$post->price}}$</p>
            </div>
        </div>
    </div>
</x-app-layout>
