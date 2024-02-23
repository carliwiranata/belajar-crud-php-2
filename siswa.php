<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$sql = "SELECT id_siswa,nis,nama_siswa,jenis_kelamin,alamat,nama_kelas,nama_jurusan FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_siswa.id_jurusan";
$result = mysqli_query($koneksi, $sql);

?>


<div class="container mt-5">
    <h3>Data Siswa</h3>
    <a href="tambahsiswa.php" class="btn btn-primary float-end">Tambah Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nis</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nama Kelas</th>
                <th>Nama Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $row['nis'] ?></td>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['nama_kelas'] ?></td>
                    <td><?= $row['nama_jurusan'] ?></td>
                    <td>
                        <a href="editsiswa.php?id_siswa=<?= $row['id_siswa'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php $a++ ?>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php
include 'templates/footer.php';

?>