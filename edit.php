<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To do list</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        include "koneksi.php";

        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_task WHERE id=$id");
        while ($data = mysqli_fetch_array($query)) {
    ?>
    <div class="card-header">
        <form action="action.php" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <label for="">Nama Task :</label>
                <input type="text" name="nama_task" class="form-input" value="<?= $data['nama_task'] ?>"
                    placeholder="Masukan Todo/Tugas Kamu" required>

                <label for="">Prioritas :</label>
                <select name="prioritas" class="form-input" required>
                    <option value="tinggi" <?= $data['prioritas'] == 'tinggi' ? 'selected' : '' ?>>Tinggi</option>
                    <option value="sedang" <?= $data['prioritas'] == 'sedang' ? 'selected' : '' ?>>Sedang</option>
                    <option value="rendah" <?= $data['prioritas'] == 'rendah' ? 'selected' : '' ?>>Rendah</option>
                </select>
                <label>Status :</label>
                <select name="status" class="form-input" required>
                    <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                    <option value="Belum Selesai" <?= $data['status'] == 'Belum Selesai' ? 'selected' : '' ?>>Belum
                        Selesai</option>
                </select>

                <button type="submit" name="edit">
                    Edit
                </button>
            </div>
        </form>
    </div>

    <?php
        }
    ?>
</body>

</html>