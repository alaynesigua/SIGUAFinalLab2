<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
                
                <div ><table style="margin: auto; width:100%" class="min-w-full divide-y divide-gray-200"  >
                    <thead>
                        <tr>
                            <th style="background: black; color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th style="background: black;  color:white;" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                            <th  style="background: black;  color:white;"class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                            <th  style="background: black;  color:white;"class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $category->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $category->category_name}}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $category->user_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $category->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table></div>

            </div>
            <br><br><br><br>
            <form method="POST" action="{{ route('categories.store') }}">
                 @csrf
                        <div class="mb-4">
                            <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-4">
                        <button type="submit" style="background:black; color:white;">Add Category</button>
                        </div>
                    </form>
        </div>
        
    </div>
</x-app-layout>