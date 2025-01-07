<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Inventaris</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <style>
        /* Styling untuk tabel dengan warna ungu muda */
        table.dataTable thead {
            background-color: #D8B7DD; /* Warna ungu muda untuk header */
        }
        table.dataTable tbody tr:nth-child(odd) {
            background-color: #F2E7F9; /* Warna ungu muda muda untuk baris ganjil */
        }
        table.dataTable tbody tr:nth-child(even) {
            background-color: #E6D4E6; /* Warna ungu muda tua untuk baris genap */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-3">Inventaris BEM-KM POLMAN Bandung</h1>

        <!-- Form Input Nama Kementerian dan Orang yang Hadir -->
        <form action="" method="POST" id="infoForm" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kementerian">Nama Kementerian</label>
                    <input type="text" id="kementerian" name="kementerian" class="form-control" placeholder="Masukkan nama kementerian" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="namaHadir">Orang yang Hadir</label>
                    <input type="text" id="namaHadir" name="namaHadir" class="form-control" placeholder="Masukkan nama orang yang hadir" required>
                </div>
            </div>
        </form>

        <table class="table table-bordered" id="exporttable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $index => $stock): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $stock['namabarang'] ?></td>
                    <td><?= $stock['deskripsi'] ?></td>
                    <td><?= $stock['stock'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- DataTables and Buttons JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
$(document).ready(function() {
    $('#exporttable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel',
            {
                extend: 'pdfHtml5',
                title: 'Inventaris BEM-KM POLMAN Bandung', // Set the main title
                orientation: 'landscape',
                pageSize: 'A4',
                filename: function() {
                    var currentDate = new Date();
                    var year = currentDate.getFullYear();
                    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
                    var day = ('0' + currentDate.getDate()).slice(-2);
                    return 'Inventaris_BEM-KM_POLMAN_Bandung_' + year + month + day;
                },
                customize: function(doc) {
                    // Define column widths and styling for the table header and rows
                    doc.content[1].table.widths = ['10%', '35%', '35%', '20%'];
                    doc.content[1].margin = [0, 0, 0, 0];
                    doc.content[1].table.body[0].forEach(function(cell) {
                        cell.fillColor = '#D8B7DD';
                        cell.color = 'white';
                        cell.bold = true;
                        cell.alignment = 'center';
                        cell.fontSize = 12;
                    });
                    
                    doc.content[1].table.body.forEach(function(row) {
                        row.forEach(function(cell) {
                            cell.margin = [5, 5, 5, 5];
                            cell.fontSize = 10;
                            cell.alignment = 'center';
                        });
                    });

                    // Add export date below the title
                    var currentDate = new Date();
                    var formattedDate = currentDate.getDate() + '/' + (currentDate.getMonth() + 1) + '/' + currentDate.getFullYear();

                    // Fetch the values for Kementerian and Orang yang Hadir
                    var kementerian = document.getElementById('kementerian').value || 'N/A';
                    var namaHadir = document.getElementById('namaHadir').value || 'N/A';

                    // Add the export date, Kementerian, and Orang yang Hadir below the title
                    doc.content.splice(1, 0, {
                        text: [
                            { text: 'Tanggal Inventaris: ' + formattedDate + '\n', fontSize: 12, alignment: 'left' },
                            { text: 'Kementerian: ' + kementerian + '\n', fontSize: 12, alignment: 'left' },
                            { text: 'Anggota yang Hadir: ' + namaHadir + '\n\n', fontSize: 12, alignment: 'left' }
                        ],
                        margin: [0, 0, 0, 10]
                    });
                }
            },
            'print'
        ]
    });
});
</script>

</body>
</html>
