<?php
class CalculateNA
{
    public static function calculateNA($partisipasi, $tugas, $uts, $uas)
    {
        // Lakukan perhitungan NA sesuai ketentuan di link yang diberikan
        $partisipasiWeight = 0.1;
        $tugasWeight = 0.2;
        $utsWeight = 0.3;
        $uasWeight = 0.4;

        $na = ($partisipasi * $partisipasiWeight) + ($tugas * $tugasWeight) + ($uts * $utsWeight) + ($uas * $uasWeight);

        return $na; // Nilai Akhir (NA)
    }
}
?>
