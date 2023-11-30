
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container-fluid">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <table style="margin: auto; width:100%" class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Brand Name</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Brand Image</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Created</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
    <td class="px-6 py-4 whitespace-no-wrap">{{ $brand->id }}</td>
    <td class="px-6 py-4 whitespace-no-wrap">{{ $brand->brand_name }}</td>
    <td class="px-6 py-4 whitespace-no-wrap">
    <img src="{{ asset('storage/' . $brand->brand_image) }}" alt="Brand Image" style="height:500px;" class="">
    </td>
    <td class="px-6 py-4 whitespace-no-wrap">{{ $brand->created_at->diffForHumans() }}</td>
    <td class="px-6 py-4 whitespace-no-wrap text-black">
    <div class="flex justify-center items-center space-x-2">
        <a href="{{ route('brands.edit', $brand->id) }}" class="btn-edit">Edit</a>
        <form method="POST" action="{{ route('brands.softDelete', $brand->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-soft-delete">Soft Delete</button>
        </form>
        <form method="POST" action="{{ route('brands.destroy', $brand->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Delete Permanently</button>
        </form>
    </div>
</td>


</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4">Soft Deleted Brands</h2>
                    <table style="margin: auto; width:100%" class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Brand Name</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Brand Image</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Created</th>
                                <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deletedBrands as $deletedBrand)
                            
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $deletedBrand->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $deletedBrand->brand_name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <img src="{{ asset('storage/' . $deletedBrand->brand_image) }}" style="object-fit:contain; height:500px;" alt="Brand Image" >
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $deletedBrand->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-black">
                                    <div class="flex justify-center items-center space-x-2">
                                        <form method="POST" action="{{ route('brands.restore', $deletedBrand->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-restore">Restore</button>
                                        </form>
                                        <form method="POST" action="{{ route('brands.destroy', $deletedBrand->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"class="btn-delete">Delete Permanently</button>
                                        </form>
</div>
                                    </td>
                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
</div>
            <br><br><br><br>

            <div class="mt-8">
        <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="brand_name" class="block text-sm font-medium text-gray-700">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="brand_image" class="block text-sm font-medium text-gray-700">Brand Image</label>
                <input type="file" name="brand_image" id="brand_image" class="form-input rounded-md shadow-sm mt-1 block w-full" accept="image/*" required>
            </div>
            <div class="mb-4">
                <button type="submit" style="background:black; color:white;">Add Brand</button>
            </div>
        </form>
    </div>
    <style>
.btn-edit,
.btn-soft-delete,
.btn-restore,
.btn-delete {
    display: inline-block;

   margin-left:5px;
    line-height: 1.5;
    border-radius: 0.25rem;
}

.btn-edit {
    background-color: #000000; 
    color: white; 
}

.btn-soft-delete {
    background-color: #000000; 
    color: white; 
}

.btn-restore {
    background-color: #000000; 
    color: white; 
}

.btn-delete {
    background-color: #000000; 
    color: white; 
}
.btn-edit,
.btn-soft-delete,
.btn-restore,
.btn-delete {
    width: 100px;
    text-align: center;
    
}
    </style>
</x-app-layout>