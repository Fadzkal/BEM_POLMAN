<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Inventaris - Stock Barang</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Stock Barang</h2>
        <a href="/export" class="btn btn-info">Export Data</a>
        <a href="/export-buktipiket" class="btn btn-info">Bukti Piket</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($stocks as $stock): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= htmlspecialchars($stock['namabarang']); ?></td>
                    <td><?= htmlspecialchars($stock['deskripsi']); ?></td>
                    <td><?= htmlspecialchars($stock['stock']); ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $stock['idbarang']; ?>">Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $stock['idbarang']; ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>