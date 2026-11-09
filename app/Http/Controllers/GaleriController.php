<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $query = Galeri::query();

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $galeri = $query->orderBy('tanggal', 'desc')->paginate(9);
        $kategoriList = Galeri::select('kategori')->distinct()->pluck('kategori');

        return view('galeri.index', compact('galeri', 'kategoriList', 'kategori'));
    }
}

