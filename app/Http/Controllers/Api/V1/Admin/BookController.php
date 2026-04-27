<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    
    public function index()
    {
        $books = $this->bookService->semuaBuku();

        return response()->json([
            'success' => true,
            'message' => 'Semua buku berhasil didapatkan',
            'data' => $books,
        ],200);
    }

    
    public function store(Request $request)
    {
        $data = $this->bookService->tambahBuku($request);

        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil ditambahkan',
            'data' => $data,
        ],200);
    }

   
    public function show(string $id)
    {
        $data = $this->bookService->satuBuku($id);

        if(!$data){
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ada bro',
            ],404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil didapatkan',
            'data' => $data,
        ],200);
    }

   
    public function update(Request $request, string $id)
    {
        $data = $this->bookService->updateBuku($request,$id);

        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil diupdate',
            'data' => $data,
        ],200);
    }

    public function destroy(string $id)
    {
        $data = $this->bookService->hapusBuku($id);

        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil dihapus',
            'data' => $data,
        ],200);
    }
}
