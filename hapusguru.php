<?php
include 'config/koneksi.php';
$id_guru = $_GET['id_guru'];

$sql = "DELETE FROM tb_guru WHERE id_guru = '$id_guru'";

$query = mysqli_query($koneksi,$sql);

if ($query) {
    echo "<script>alert('Data berhasil dihapus');document.location.href='guru.php';</script>";
}else{
    echo "<script>alert('Data gagal dihapus');document.location.href='guru.php';</script>";
}