<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
$jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");


if (isset($_POST['kirim'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $id_kelas = htmlspecialchars($_POST['id_kelas']);
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);

    $sql = "INSERT INTO tb_siswa (id_siswa,nis,nama_siswa,jenis_kelamin,alamat,id_kelas,id_jurusan) 
    VALUES ('','$nis','$nama_siswa','$jenis_kelamin','$alamat','$id_kelas','$id_jurusan')";

    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil ditambah');document.location.href='siswa.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah');</script>";
    }
}

?>


<div class="container mt-5">
    <h3>Tambah Siswa</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nis</label>
            <input required type="number" name="nis" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
            <input required type="text" name="nama_siswa" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="form-control" id="">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea required name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kelas</label>
            <select required name="id_kelas" class="form-control" id="">
                <?php while ($row = mysqli_fetch_assoc($kelas)) : ?>
                    <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas']  ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
            <select required name="id_jurusan" class="form-control" id="">
                <?php while ($row = mysqli_fetch_assoc($jurusan)) : ?>
                    <option value="<?= $row['id_jurusan'] ?>"><?= $row['nama_jurusan']  ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-end" name="kirim">Kirim</button>
    </form>
</div>

<?php
include 'templates/footer.php';

?>