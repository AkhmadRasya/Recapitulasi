<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:3072',
            'status' => 'required|in:published,draft',
            'tanggal_publikasi' => 'required|date'
        ]);

        $gambar = 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=800&q=80';
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $gambar = '/storage/' . $path;
        }

        $slug = Str::slug($request->judul) . '-' . rand(100, 999);

        Berita::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'kategori' => $request->kategori,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'gambar' => $gambar,
            'penulis' => auth()->user()->nama_lengkap ?? 'Admin Kelurahan',
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.form', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:3072',
            'status' => 'required|in:published,draft',
            'tanggal_publikasi' => 'required|date'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = '/storage/' . $path;
        }

        $berita->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

