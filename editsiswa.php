<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$id_siswa = $_GET['id_siswa'];
$kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
$jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
$result = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'");
$siswa = mysqli_fetch_assoc($result);

if (isset($_POST['kirim'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $id_kelas = htmlspecialchars($_POST['id_kelas']);
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);

    $sql = "UPDATE tb_siswa SET nis = '$nis', nama_siswa = '$nama_siswa', 
    jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', id_kelas = '$id_kelas'
    , id_jurusan = '$id_jurusan' WHERE id_siswa = '$id_siswa'";

    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil diupdate');document.location.href='siswa.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
    }
}

?>


<div class="container mt-5">
    <h3>Update Siswa</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nis</label>
            <input required type="number" value="<?= $siswa['nis'] ?>" name="nis" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
            <input required type="text" value="<?= $siswa['nama_siswa'] ?>" name="nama_siswa" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="form-control" id="">
                <option value="Laki-laki" <?= $siswa['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $siswa['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea required name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $siswa['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kelas</label>
            <select required name="id_kelas" class="form-control" id="">
                <?php while ($row = mysqli_fetch_assoc($kelas)) : ?>
                    <option value="<?= $row['id_kelas'] ?>" <?= $siswa['id_kelas'] == $row['id_kelas'] ? 'selected' : '' ?>><?= $row['nama_kelas']  ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
            <select required name="id_jurusan" class="form-control" id="">
                <?php while ($row = mysqli_fetch_assoc($jurusan)) : ?>
                    <option value="<?= $row['id_jurusan'] ?>" <?= $siswa['id_jurusan'] == $row['id_jurusan'] ? 'selected' : '' ?>><?= $row['nama_jurusan']  ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-end" name="kirim">Kirim</button>
    </form>
</div>

<?php
include 'templates/footer.php';

?>