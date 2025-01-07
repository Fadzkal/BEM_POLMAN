<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Inventaris BEM-KM POLMAN Bandung</h1>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Tambah Barang</button>
        
        <!-- Tambahkan Tombol Export -->
        <a href="/stock/export" class="btn btn-success mb-3">Hasil Inventaris</a>
        
        <table class="table table-bordered">
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
                <?php foreach ($stocks as $index => $stock): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $stock['namabarang'] ?></td>
                    <td><?= $stock['deskripsi'] ?></td>
                    <td><?= $stock['stock'] ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $stock['idbarang'] ?>">Edit</button>
                        <a href="/stock/delete/<?= $stock['idbarang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $stock['idbarang'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form method="post" action="/stock/update/<?= $stock['idbarang'] ?>?redirect=<?= current_url() ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="namabarang" value="<?= $stock['namabarang'] ?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="deskripsi" value="<?= $stock['deskripsi'] ?>" class="form-control" required>
                                    <br>
                                    <input type="number" name="stock" value="<?= $stock['stock'] ?>" class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/stock/add">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                        <br>
                        <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                        <br>
                        <input type="number" name="stock" placeholder="Stock Barang" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
