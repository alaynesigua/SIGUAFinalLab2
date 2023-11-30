<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Brand') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="brand_name" class="block text-sm font-medium text-gray-700">Brand Name</label>
                            <input type="text" name="brand_name" id="brand_name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $brand->brand_name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="brand_image" class="block text-sm font-medium text-gray-700">Brand Image</label>
                            <input type="file" name="brand_image" id="brand_image" class="form-input rounded-md shadow-sm mt-1 block w-full" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <button type="submit" style="background:black; color:white;" class="px-4 py-2 rounded-md">Update Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
