<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:riwayat-list', ['only' => ['index']]);
         $this->middleware('permission:riwayat-show', ['only' => ['show']]);
    }

    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $riwayat = Riwayat::with('penyakit')
                ->orderBy('id', 'asc') // Mengurutkan berdasarkan ID secara ascending
                ->paginate(10); // Membatasi per halaman 10 item
        } else {
            $riwayat = auth()->user()
                ->riwayats()
                ->with('penyakit')
                ->orderBy('id', 'asc') // Mengurutkan berdasarkan ID secara ascending
                ->paginate(10); // Membatasi per halaman 10 item
        }

        return view('admin.riwayat.index', compact('riwayat'));
    }

    public function show(Riwayat $riwayat)
    {
        $this->authorize('show', $riwayat);
        return view('admin.riwayat.show', compact('riwayat'));
    }
}
