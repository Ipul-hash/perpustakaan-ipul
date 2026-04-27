<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberPageController extends Controller
{
    public function pinjamBuku()
    {
        return view('member.pinjambuku');
    }

    public function riwayat()
    {
        return view('member.riwayat');
    }

    public function dashboard()
    {
        return view('member.dashboard');
    }
}