<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function semuaCategories()
    {
        return Category::withCount('books')->get();
    }

    public function satuCategory($id)
    {
        return Category::find($id);
    }

    public function tambahCategories($data)
    {
        return Category::create([
            'name' => $data['name'],
            'slug' => $data['slug'] ?? null,
        ]);
    }

    public function updateCategories($data, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return null;
        }

        $category->update([
            'name' => $data['name'],
            'slug' => $data['slug'] ?? $category->slug,
        ]);

        return $category->refresh();
    }

    public function deleteCategories($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return null;
        }

        $category->delete();
        return $category;
    }
}