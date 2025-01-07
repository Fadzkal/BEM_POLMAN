<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Piket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Tambah Jadwal Piket</h1>

    <form method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="kementrian">Kementrian</label>
            <input type="text" name="kementrian" id="kementrian" class="form-control" required>
            <?php if (isset($validation) && $validation->getError('kementrian')): ?>
                <div class="text-danger"><?= $validation->getError('kementrian') ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="text" name="waktu" id="waktu" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="anggota">Anggota</label>
            <input type="text" name="anggota" id="anggota" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/jadwal" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
