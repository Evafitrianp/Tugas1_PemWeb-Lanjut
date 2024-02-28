
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Konversi Nilai</title>
</head>
<body>

<div class="container mt-5">
    <form method="POST" action="">
        <h2>Konversi Nilai</h2>
        <div class="form-group">
            <label for="partisipasi">Nilai Partisipasi:</label>
            <input type="text" class="form-control" name="partisipasi" value="<?php echo isset($partisipasi) ? $partisipasi : ''; ?>">
        </div>
        <div class="form-group">
            <label for="tugas">Nilai Tugas:</label>
            <input type="text" class="form-control" name="tugas" value="<?php echo isset($tugas) ? $tugas : ''; ?>">
        </div>
        <div class="form-group">
            <label for="uts">Nilai UTS:</label>
            <input type="text" class="form-control" name="uts" value="<?php echo isset($uts) ? $uts : ''; ?>">
        </div>
        <div class="form-group">
            <label for="uas">Nilai UAS:</label>
            <input type="text" class="form-control" name="uas" value="<?php echo isset($uas) ? $uas : ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>
    <?php
    require_once('Calculator.php');

    $errorMessages = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi input
        $partisipasi = $_POST['partisipasi'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        Calculator::calculateAndDisplay($partisipasi, $tugas, $uts, $uas);

    }
    ?>
</div>

</body>
</html>
