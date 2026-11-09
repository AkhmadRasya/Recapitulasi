<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $search = $request->get('q');

        $query = Berita::where('status', 'published');

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        $berita = $query->orderBy('tanggal_publikasi', 'desc')->paginate(6);
        $kategoriList = Berita::select('kategori')->distinct()->pluck('kategori');

        return view('berita.index', compact('berita', 'kategoriList', 'kategori', 'search'));
    }

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->increment('views');

        $beritaTerkait = Berita::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(3)
            ->get();

        return view('berita.detail', compact('berita', 'beritaTerkait'));
    }
}

