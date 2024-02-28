<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Konversi Nilai</h2>

        <!-- Menampilkan pesan kesalahan -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/konversi" method="post" novalidate>
            @csrf
            <div class="form-group">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="text" class="form-control" id="partisipasi" name="partisipasi" required>
            </div>
            <div class="form-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="text" class="form-control" id="tugas" name="tugas" required>
            </div>
            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="text" class="form-control" id="uts" name="uts" required>
            </div>
            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="text" class="form-control" id="uas" name="uas" required>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>
    </div>
</body>
</html>
