<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->semuaCategories();

        return response()->json([
            'success' => true,
            'message' => 'Semua kategori berhasil didapatkan',
            'data' => $categories,
        ],200);
    }

    public function store(Request $request)
    {
        $category = $this->categoryService->tambahCategories($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $category,
        ],201);
    }

    public function show(string $id)
    {
        $category = $this->categoryService->satuCategory($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil didapatkan',
            'data' => $category,
        ],200);
    }

    public function update(Request $request, string $id)
    {
        $category = $this->categoryService->updateCategories($request->all(), $id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diupdate',
            'data' => $category,
        ],200);
    }

    public function destroy(string $id)
    {
        $category = $this->categoryService->deleteCategories($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus',
            'data' => $category,
        ],200);
    }
}

