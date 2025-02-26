<?php
include "koneksi.php";

function executeQuery($query)
{
    global $koneksi;
    mysqli_query($koneksi, $query);
    header('location: index.php');
    exit;
}

if (isset($_POST["tambah"])) {
    $nama_task = $_POST["nama_task"];
    $prioritas = $_POST["prioritas"];
    $status = "Belum Selesai";
    $tanggal = date('Y-m-d');
    executeQuery("INSERT INTO tbl_task VALUES (null, '$nama_task', '$prioritas', '$status', '$tanggal')");
}

if (isset($_GET['hapus'])) {
    $id = $_GET["hapus"];
    executeQuery("DELETE FROM tbl_task WHERE id = $id");
}

if (isset($_GET['selesai'])) {
    $id = $_GET['selesai'];
    executeQuery("UPDATE tbl_task SET status = 'Selesai' WHERE id = $id");
}
