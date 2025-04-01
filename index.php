<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do list</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card-header">
        <div class="title">
            To Do List
        </div>
        <div class="biodata">
            Nama : Jamaludin Hanif | No Peserta : 00234510
        </div>

        <form action="action.php" method="post">
            <div class="form-group">
                <label for="">Nama Task :</label>
                <input type="text" name="nama_task" class="form-input" placeholder="Masukan Todo/Tugas Kamu" required>

                <label for="">Prioritas :</label>
                <select name="prioritas" id="" class="form-input" required>
                    <option value="tinggi">Tinggi</option>
                    <option value="sedang">Sedang</option>
                    <option value="rendah">Rendah</option>
                </select>

                <button type="submit" name="tambah">
                    Tambahkan
                </button>
            </div>
        </form>
    </div>

    <div class="card-todo">
        <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_task ORDER BY FIELD (prioritas, 'tinggi', 'sedang', 'rendah'), tanggal DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {
                ?>
        <div class="todo-item">
            <div class="todo-header">
                <p><?= $no++ ?>. <?= $data["nama_task"]; ?></p>
            </div>

            <div class="todo-footer">
                <p>📅 <?= $data["tanggal"]; ?></p>
                <div class="divider"></div>
                <p class="priority <?= $data["prioritas"]; ?>">Prioritas <?= $data["prioritas"]; ?></p>
                <div class="divider"></div>
                <p class="status <?= $data["status"]; ?>">Status <?= $data["status"]; ?></p>
                <div class="divider"></div>
                <div class="todo-actions">
                    <a href="action.php?hapus=<?= $data["id"] ?>">🗑️</a>
                    <a href="edit.php?id=<?= $data["id"] ?>">✏️</a>
                    <?php if ($data['status'] == 'Belum Selesai'): ?>
                    <a href="action.php?selesai=<?= $data["id"] ?>">✅</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
                }
                ?>
    </div>
    </div>
</body>

</html>