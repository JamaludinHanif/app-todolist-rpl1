<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action.php" method="post">
        <label>Nama Task :</label> <br>
        <input type="text" name="nama_task"> <br>
        <label>Prioritas :</label> <br>
        <select name="prioritas">
            <option value="tinggi">tinggi</option>
            <option value="sedang">sedang</option>
            <option value="rendah">rendah</option>
        </select> <br>
        <button type="submit" name="tambah">tambah</button> <br>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Task</th>
            <th>Prioritas</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_task ORDER BY FIELD(prioritas, 'tinggi', 'sedang', 'rendah'), tanggal ASC");
            $no = 1;
            while ($data = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $no++?></td>
            <td><?=$data['nama_task']?></td>
            <td><?=$data['prioritas']?></td>
            <td><?=$data['status']?></td>
            <td><?=$data['tanggal']?></td>
            <td><a href="action.php?hapus=<?=$data['id'];?>">hapus</a> |
                <?php if ($data['status'] == "Belum Selesai") { ?>
                    <a href="action.php?selesai=<?=$data['id'];?>">Selesaikan</a>
                <?php
                    }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
