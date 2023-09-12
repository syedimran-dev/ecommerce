<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="name" name="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="image" name="price">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4">
                Submit
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
