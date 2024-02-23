<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';



if (isset($_POST['kirim'])) {
    $nama_guru = htmlspecialchars($_POST['nama_guru']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $mapel = htmlspecialchars($_POST['mapel']);

    $sql = "INSERT INTO tb_guru (id_guru,nama_guru,jenis_kelamin,alamat,mapel) 
    VALUES ('','$nama_guru','$jenis_kelamin','$alamat','$mapel')";

    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil ditambah');document.location.href='guru.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah');</script>";
    }
}

?>


<div class="container mt-5">
    <h3>Tambah Guru</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
            <input required type="text" name="nama_guru" class="form-control" id="exampleFormControlInput1">
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
            <label for="exampleFormControlInput1" class="form-label">Mata Pelajaran</label>
            <input required type="text" name="mapel" class="form-control" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-primary float-end" name="kirim">Kirim</button>
    </form>
</div>

<?php
include 'templates/footer.php';

?>