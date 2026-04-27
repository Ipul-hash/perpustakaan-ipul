<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function manajemenBuku()
    {
        return view('admin.manajemenbuku');
    }

    public function manajemenKategori()
    {
        return view('admin.manajemenkategori');
    }

    public function manajemenPeminjam()
    {
        return view('admin.manajemenpeminjam');
    }

    public function manajemenPengembalian()
    {
        return view('admin.manajemenpengembalian');
    }

    public function manajemenAnggota()
    {
        return view('admin.manajemenanggota');
    }

    public function manajemenMember()
    {
        return view('admin.manajemenmember');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
