<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }

    public function getAllCategories($request)
    {
        $query = Category::with('products');

        if ($request['search']) {
            $query->where('name', 'ilike', '%' . $request['search'] . '%');
        }

        $categories = $query->get();
        return response()->json($categories);
    }

    public function getCategory(Category $category)
    {
        return $category->load('products');
    }
}
