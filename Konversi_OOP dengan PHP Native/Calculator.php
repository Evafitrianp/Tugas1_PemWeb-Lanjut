<?php
class Calculator
{
    public static function calculateAndDisplay($partisipasi, $tugas, $uts, $uas)
    {
        $errorMessages = [];

        // Validasi input
        if (empty($partisipasi)) {
            $errorMessages[] = "Nilai Partisipasi harus diisi!";
        }
        if (empty($tugas)) {
            $errorMessages[] = "Nilai Tugas harus diisi!";
        }
        if (empty($uts)) {
            $errorMessages[] = "Nilai UTS harus diisi!";
        }
        if (empty($uas)) {
            $errorMessages[] = "Nilai UAS harus diisi!";
        }
    
        // Validasi apakah nilai berupa angka
        if (!is_numeric($partisipasi) || !is_numeric($tugas) || !is_numeric($uts) || !is_numeric($uas)) {
            $errorMessages[] = "Nilai harus berupa angka!";
        }
    
        // Validasi rentang nilai
        if ($partisipasi < 0 || $partisipasi > 100 || $tugas < 0 || $tugas > 100 || $uts < 0 || $uts > 100 || $uas < 0 || $uas > 100) {
            $errorMessages[] = "Nilai harus dalam rentang 0-100!";
        }

        // Jika tidak ada pesan kesalahan, hitung NA dan konversi ke NH
        if (empty($errorMessages)) {
            require_once('CalculateNA.php');
            require_once('ConvertToNH.php');

            $na = CalculateNA::calculateNA($partisipasi, $tugas, $uts, $uas);
            $nh = ConvertToNH::convertToNH($na);

            // Tampilkan hasil
            echo "Nilai Akhir (NA): " . $na . "<br>";
            echo "Nilai Konversi Huruf (NH): " . $nh;
        } else {
            // Tampilkan pesan kesalahan
            foreach ($errorMessages as $errorMessage) {
                echo $errorMessage . "<br>";
            }
        }
    }
}
?>
