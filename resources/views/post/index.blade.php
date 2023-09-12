<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card py-4">
            <div class="card-title d-flex justify-content-between h-100 align-items-center px-3">
                <h1 class="fw-bold">All Posts</h1>
                <a class="btn btn-primary" href="{{ route('post.create') }}">Add Product</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td><img style="width: 100px" src="{{ "/storage/$post->image" }}" alt=""></td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->price }}</td>
                                <td>
                                    @if (auth()->user()->isAdmin)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-primary bg-primary" type="submit">Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
