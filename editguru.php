<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$id_guru = $_GET['id_guru'];

$result = mysqli_query($koneksi, "SELECT * FROM tb_guru WHERE id_guru = '$id_guru'");

$guru = mysqli_fetch_assoc($result);

if (isset($_POST['kirim'])) {
    $nama_guru = htmlspecialchars($_POST['nama_guru']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $mapel = htmlspecialchars($_POST['mapel']);

    $sql = "UPDATE tb_guru SET nama_guru = '$nama_guru', jenis_kelamin = '$jenis_kelamin' , alamat = '$alamat', mapel = '$mapel' WHERE id_guru = '$id_guru'";

    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil diupdate');document.location.href='guru.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
    }
}

?>


<div class="container mt-5">
    <h3>Tambah Guru</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
            <input required type="text" value="<?= $guru['nama_guru'] ?>" name="nama_guru" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="form-control" id="">
                <option value="Laki-laki" <?= $guru['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $guru['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea required name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $guru['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mata Pelajaran</label>
            <input value="<?= $guru['mapel'] ?>" required type="text" name="mapel" class="form-control" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-primary float-end" name="kirim">Kirim</button>
    </form>
</div>

<?php
include 'templates/footer.php';

?>