<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonversiController extends Controller
{
    public function konversiNilai(Request $request)
    {
        // Validasi input
        $request->validate([
            'partisipasi' => 'required|numeric|between:0,100',
            'tugas' => 'required|numeric|between:0,100',
            'uts' => 'required|numeric|between:0,100',
            'uas' => 'required|numeric|between:0,100',
        ], [
            'required' => 'Nilai :attribute tidak boleh kosong.',
            'numeric' => 'Nilai :attribute harus angka.',
            'between' => 'Nilai :attribute harus dalam rentang 0 - 100.',
        ]);

        // Menghitung Nilai Akhir (NA)
        $na = ($request->partisipasi * 0.2) + ($request->tugas * 0.3) + ($request->uts  * 0.2) + ($request->uas * 0.3);

        // Mengonversi Nilai Akhir (NA) menjadi Nilai Huruf (NH)
        $nh = $this->konversiHuruf($na);

        // Menampilkan hasil
        return view('hasil', compact('na', 'nh'));
    }


    private function konversiHuruf($na)
    {
        // Logika konversi nilai huruf sesuai ketentuan
        // Anda dapat mengimplementasikan logika sesuai tautan yang diberikan
        // https://layananakademik.unesa.ac.id/page/standar-penilaian

        // Contoh sederhana
        if ($na >= 85) {
            return 'A';
        } elseif ($na >= 80) {
            return 'A-';
        } elseif ($na >= 75) {
            return 'B+';
        } elseif ($na >= 70) {
            return 'B';
        } elseif ($na >= 65) {
            return 'B-';
        } elseif ($na >= 60) {
            return 'C+';
        } elseif ($na >= 55) {
            return 'C';
        } elseif ($na >= 40) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
