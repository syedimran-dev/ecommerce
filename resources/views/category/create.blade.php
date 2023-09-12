<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4">
                Submit
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
