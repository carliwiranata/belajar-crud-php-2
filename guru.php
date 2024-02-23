<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$sql = "SELECT * FROM tb_guru";
$result = mysqli_query($koneksi, $sql);

?>


<div class="container mt-5">
    <h3>Data Guru</h3>
    <a href="tambahguru.php" class="btn btn-primary float-end">Tambah Guru</a>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Mata Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $row['nama_guru'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['mapel'] ?></td>
                    <td>
                        <a href="editguru.php?id_guru=<?= $row['id_guru'] ?>" class="btn btn-primary">Edit</a>
                        <a href="hapusguru.php?id_guru=<?= $row['id_guru'] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin hapus data ini?')">Hapus</a>
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