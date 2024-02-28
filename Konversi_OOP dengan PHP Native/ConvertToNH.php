<?php
class ConvertToNH
{
    public static function convertToNH($na)
    {
        // Lakukan konversi ke Nilai Huruf (NH) sesuai ketentuan di link yang diberikan
        if ($na >= 80) {
            return 'A';
        } elseif ($na >= 70) {
            return 'B';
        } elseif ($na >= 60) {
            return 'C';
        } elseif ($na >= 50) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
?>
