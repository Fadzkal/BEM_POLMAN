<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kementrian</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .table-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-warning, .btn-danger {
            transition: transform 0.1s ease-in-out;
        }
        .btn-warning:hover, .btn-danger:hover {
            transform: scale(1.05);
        }
        .empty-row {
            color: #777;
        }
    </style>
</head>
<body>

<div class="table-container">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Kementrian</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Hari</th>
                <th scope="col">Waktu</th>
                <?php if (in_array(session()->get('role'), ['Presiden BEM', 'Sekretaris'])): ?>
                    <th scope="col">Aksi</th>
                <?php endif; ?>
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
                        <?php if (in_array(session()->get('role'), ['Presiden BEM', 'Sekretaris'])): ?>
                            <td>
                                <a href="/jadwal/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm" title="Edit Jadwal">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="/jadwal/delete/<?= $row['id'] ?>" method="post" style="display:inline;">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')" title="Hapus Jadwal">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?= in_array(session()->get('role'), ['Presiden BEM', 'Sekretaris']) ? '5' : '4'; ?>" class="text-center empty-row">
                        Tidak ada data jadwal tersedia.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
