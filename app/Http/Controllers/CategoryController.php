<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'user_id' => 'required|integer',
        ]);

        // Create a new category and save it to the database
        $category = new Category;
        $category->category_name = $validatedData['category_name'];
        $category->user_id = $validatedData['user_id'];
        $category->save();

        // Redirect back to the dashboard or any other desired page
        return redirect()->route('AllCat')->with('success', 'Category created successfully');
    }
}