<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        // Anda nanti bisa mengambil data dari database di sini (misal: data event, unggahan populer, dll)
        
        return view('visitor.dashboard');
    }
}