<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <?php
        include "koneksi.php";

        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_task WHERE id=$id");
        while ($data = mysqli_fetch_array($query)) {
    ?>

        <form action="action.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <label>Nama Task :</label> <br>
            <input type="text" name="nama_task" value="<?= $data['nama_task'] ?>"> <br>
            <label>Prioritas :</label> <br>
            <select name="prioritas">
                <option value="tinggi" <?= $data['prioritas'] == 'tinggi' ? 'selected' : '' ?>>Tinggi</option>
                <option value="sedang" <?= $data['prioritas'] == 'sedang' ? 'selected' : '' ?>>Sedang</option>
                <option value="rendah" <?= $data['prioritas'] == 'rendah' ? 'selected' : '' ?>>Rendah</option>
            </select> <br>
            <label>Status :</label> <br>
            <select name="status">
                <option value="Selesai" <?= $data['prioritas'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                <option value="Belum Selesai" <?= $data['prioritas'] == 'Belum Selesai' ? 'selected' : '' ?>>Belum Selesai</option>
            </select> <br>
            <button type="submit" name="edit">edit</button> <br>
        </form>

    <?php
        }
    ?>
</body>
</html>
