<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use App\Models\Berita;
use App\Models\Penilaian;

Route::get('/', function () {return view('home');});

Route::get('/kegiatan', function () {return view('kegiatan.kegiatan');});
Route::get('/kegiatan/{id}', function ($id) {$kegiatan = Kegiatan::findOrFail($id);return view('kegiatan.detail', compact('kegiatan'));})->name('kegiatan.detail');

Route::get('/prestasi', function () {return view('prestasi.prestasi');});
Route::get('/prestasi/{id}', function ($id) {$prestasi = Prestasi::findOrFail($id);return view('prestasi.detail', compact('prestasi'));})->name('prestasi.detail');

Route::get('/berita', function () {return view('berita.berita');});
Route::get('/berita/{id}', function ($id) {$berita = Berita::findOrFail($id);return view('berita.detail', compact('berita'));})->name('berita.detail');

Route::post('/penilaian', function (Illuminate\Http\Request $request) {

    $request->validate([
        'nama' => 'required|string|max:100',
        'rating' => 'required|integer|min:1|max:5',
        'komentar' => 'required|string|max:1000',
    ]);

    Penilaian::create([
        'nama' => $request->nama,
        'rating' => $request->rating,
        'komentar' => $request->komentar,
    ]);

    return back()->with('success', 'Penilaian berhasil dikirim!');
})->name('penilaian.store');