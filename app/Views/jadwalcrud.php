<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal CRUD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Jadwal CRUD</h2>
    <div class="text-right mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Jadwal</button>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Kementrian</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jadwal)): ?>
                <?php foreach ($jadwal as $row): ?>
                    <tr>
                        <td><?= esc($row['kementrian']) ?></td>
                        <td><?= esc($row['tanggal']) ?></td>
                        <td><?= esc($row['hari']) ?></td>
                        <td><?= esc($row['waktu']) ?></td>
                        <td>
                            <!-- Button untuk edit -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?= $row['id'] ?>" data-kementrian="<?= esc($row['kementrian']) ?>" data-tanggal="<?= esc($row['tanggal']) ?>" data-hari="<?= esc($row['hari']) ?>" data-waktu="<?= esc($row['waktu']) ?>">Edit</button>
                            <!-- Form delete -->
                            <form action="/jadwal/delete/<?= $row['id'] ?>" method="post" style="display:inline;">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada jadwal tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal untuk Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/jadwal/store" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kementrian">Kementrian</label>
                        <input type="text" class="form-control" id="kementrian" name="kementrian" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT"> <!-- Untuk method PUT -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kementrian">Kementrian</label>
                        <input type="text" class="form-control" id="editKementrian" name="kementrian" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" id="editHari" name="hari" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="editWaktu" name="waktu" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var kementrian = button.data('kementrian');
    var tanggal = button.data('tanggal');
    var hari = button.data('hari');
    var waktu = button.data('waktu');

    var modal = $(this);
    modal.find('#editKementrian').val(kementrian);
    modal.find('#editTanggal').val(tanggal);
    modal.find('#editHari').val(hari);
    modal.find('#editWaktu').val(waktu);

    // Set the form action URL to include the correct ID
    var form = modal.find('form');
    form.attr('action', '/jadwal/update/' + id);
});
</script>

</body>
</html>
