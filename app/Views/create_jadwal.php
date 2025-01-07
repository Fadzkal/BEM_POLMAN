<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .form-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="text-center">Tambah Jadwal</h2>
    <form action="/jadwal/store" method="POST">
        <?= csrf_field() ?>
        
        <!-- Input Kementrian -->
        <div class="form-group">
            <label for="kementrian">Kementrian</label>
            <input type="text" class="form-control" id="kementrian" name="kementrian" value="<?= old('kementrian') ?>" required>
            <?php if (isset($errors['kementrian'])): ?>
                <div class="text-danger"><?= $errors['kementrian'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Input Tanggal -->
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal') ?>" required>
            <?php if (isset($errors['tanggal'])): ?>
                <div class="text-danger"><?= $errors['tanggal'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Input Hari -->
        <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" value="<?= old('hari') ?>" required>
            <?php if (isset($errors['hari'])): ?>
                <div class="text-danger"><?= $errors['hari'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Input Waktu -->
        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="time" class="form-control" id="waktu" name="waktu" value="<?= old('waktu') ?>" required>
            <?php if (isset($errors['waktu'])): ?>
                <div class="text-danger"><?= $errors['waktu'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Tambah Jadwal</button>
    </form>
</div>

</body>
</html>
