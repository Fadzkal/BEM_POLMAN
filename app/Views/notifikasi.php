<h2>Notifikasi</h2>
<table>
    <tr>
        <th>Pesan</th>
        <th>Status</th>
    </tr>
    <?php foreach ($notifikasi as $notif): ?>
        <tr>
            <td><?php echo $notif['pesan']; ?></td>
            <td><?php echo $notif['status']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
