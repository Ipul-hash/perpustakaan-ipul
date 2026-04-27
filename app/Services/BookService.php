<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function semuaBuku()
    {
        return Book::with('category','loans','reviews')->get();
    }

    public function satuBuku($id)
    {
        return Book::with(['category','reviews','loans'])->find($id);
    }

    public function tambahBuku($request)
    {
        return Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
    }

    public function updateBuku($request,$id)
    {
        $buku = Book::find($id);
        $buku->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        return $buku;
    }

    public function hapusBuku($id)
    {
        $buku = Book::find($id);
        $buku->delete();
        return $buku;
    }   
}

