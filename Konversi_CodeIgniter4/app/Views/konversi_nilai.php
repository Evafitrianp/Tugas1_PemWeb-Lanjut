<!-- app/Views/konversi_nilai.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <!-- Bootstrap CDN atau sumber daya serupa -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Konversi Nilai</h2>
        <form action="<?= base_url('konversi/hitungKonversi') ?>" method="post">
            <!-- Input untuk nilai partisipasi -->
            <div class="form-group">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="number" class="form-control" id="partisipasi" name="partisipasi" required>
            </div>

            <!-- Input untuk nilai tugas -->
            <div class="form-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="number" class="form-control" id="tugas" name="tugas" required>
            </div>

            <!-- Input untuk nilai UTS -->
            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="number" class="form-control" id="uts" name="uts" required>
            </div>

            <!-- Input untuk nilai UAS -->
            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="number" class="form-control" id="uas" name="uas" required>
            </div>

            <!-- Tombol submit -->
            <button type="submit" class="btn btn-primary">Hitung Konversi</button>
        </form>

        <!-- Tampilkan hasil konversi di sini -->
        <?php if (isset($hasilKonversi)) : ?>
            <h4>Hasil Konversi</h4>
            <p>Nilai Akhir (NA): <?= $hasilKonversi['nilai_akhir'] ?></p>
            <p>Nilai Konversi Huruf (NH): <?= $hasilKonversi['nilai_huruf'] ?></p>
        <?php endif; ?>

        <!-- Tampilkan pesan validasi jika ada -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS dan sumber daya serupa -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
