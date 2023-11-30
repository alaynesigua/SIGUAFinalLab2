<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function brand()
    {
        $brands = Brand::all(); 
        $deletedBrands = Brand::onlyTrashed()->get(); 

        return view('admin.brand', compact('brands', 'deletedBrands'));
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.edit-brand', compact('brand'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('brand_image')) {
            $imagePath = $request->file('brand_image')->store('brand_images', 'public');
            $validatedData['brand_image'] = $imagePath;
        }

        

        Brand::create($validatedData);

        return redirect()->back()->with('success', 'Brand added successfully!');
    }

 
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,JPG|max:2048',
        ]);

        if ($request->hasFile('brand_image')) {
            $imagePath = $request->file('brand_image')->store('brand_images', 'public');
            $validatedData['brand_image'] = $imagePath;
        }

        $brand->update($validatedData);

        return redirect()->route('AllBrands')->with('success', 'Brand updated successfully!');
    }

    public function softDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->back()->with('success', 'Brand soft deleted successfully!');
    }

    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();

        return redirect()->back()->with('success', 'Brand restored successfully!');
    }

    public function destroy($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->forceDelete();

        return redirect()->back()->with('success', 'Brand permanently deleted!');
    }
}
