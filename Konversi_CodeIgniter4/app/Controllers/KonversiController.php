<?php

namespace App\Controllers;

class KonversiController extends BaseController
{
    public function index()
    {
        return view('konversi_nilai');
    }

    // app/Controllers/KonversiController.php
public function hitungKonversi()
{
    // Ambil nilai dari form POST
    $partisipasi = $this->request->getPost('partisipasi');
    $tugas = $this->request->getPost('tugas');
    $uts = $this->request->getPost('uts');
    $uas = $this->request->getPost('uas');

    // Validasi input (misalnya: harus angka, range 0-100, tidak boleh kosong)
    $validationRules = [
        'partisipasi' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
        'tugas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
        'uts' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
        'uas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
    ];

    // Pesan kesalahan dalam Bahasa Indonesia
    $validationMessages = [
        'partisipasi' => [
            'required' => 'Nilai Partisipasi tidak boleh kosong.',
            'numeric' => 'Nilai Partisipasi harus berupa angka.',
            'greater_than_equal_to' => 'Nilai Partisipasi harus di antara 0 dan 100.',
            'less_than_equal_to' => 'Nilai Partisipasi harus di antara 0 dan 100.',
        ],
        'tugas' => [
            'required' => 'Nilai Tugas tidak boleh kosong.',
            'numeric' => 'Nilai Tugas harus berupa angka.',
            'greater_than_equal_to' => 'Nilai Tugas harus di antara 0 dan 100.',
            'less_than_equal_to' => 'Nilai Tugas harus di antara 0 dan 100.',
        ],
        'uts' => [
            'required' => 'Nilai UTS tidak boleh kosong.',
            'numeric' => 'Nilai UTS harus berupa angka.',
            'greater_than_equal_to' => 'Nilai UTS harus di antara 0 dan 100.',
            'less_than_equal_to' => 'Nilai UTS harus di antara 0 dan 100.',
        ],
        'uas' => [
            'required' => 'Nilai UAS tidak boleh kosong.',
            'numeric' => 'Nilai UAS harus berupa angka.',
            'greater_than_equal_to' => 'Nilai UAS harus di antara 0 dan 100.',
            'less_than_equal_to' => 'Nilai UAS harus di antara 0 dan 100.',
        ],
    ];

    if (!$this->validate($validationRules, $validationMessages)) {
        // Jika validasi gagal, tampilkan pesan error
        return view('konversi_nilai', ['validation' => $this->validator]);
    }

    // Hitung Nilai Akhir (NA) dan Konversi Huruf (NH) sesuai ketentuan
    $nilai_akhir = ($partisipasi * 0.2) + ($tugas * 0.3) + ($uts * 0.2) + ($uas * 0.3);

    // Konversi nilai huruf
    if ($nilai_akhir >= 85) {
        $nilai_huruf = 'A';
    } elseif ($nilai_akhir >= 80) {
        $nilai_huruf = 'A-';
    } elseif ($nilai_akhir >= 75) {
        $nilai_huruf = 'B+';
    } elseif ($nilai_akhir >= 70) {
        $nilai_huruf = 'B';
    } elseif ($nilai_akhir >= 65) {
        $nilai_huruf = 'B-';
    } elseif ($nilai_akhir >= 60) {
        $nilai_huruf = 'C+';
    } elseif ($nilai_akhir >= 55) {
        $nilai_huruf = 'C';
    } elseif ($nilai_akhir >= 40) {
        $nilai_huruf = 'D';
    } else {
        $nilai_huruf = 'E';
    }

    // Tampilkan hasil ke view
    $data['hasilKonversi'] = [
        'nilai_akhir' => $nilai_akhir,
        'nilai_huruf' => $nilai_huruf,
    ];

    return view('konversi_nilai', $data);
}

}
