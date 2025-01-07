<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Piket - View Only</title>
</head>
<body>
    <h1>Jadwal Piket (View Only)</h1>

    <!-- Tabel Jadwal -->
    <table border="1">
        <thead>
            <tr>
                <th>Kementrian</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Anggota</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jadwal) && is_array($jadwal)): ?>
                <?php foreach ($jadwal as $row): ?>
                    <tr>
                        <td><?= esc($row['kementrian']) ?></td>
                        <td><?= esc($row['hari']) ?></td>
                        <td><?= esc($row['waktu']) ?></td>
                        <td><?= esc($row['anggota']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada jadwal tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
