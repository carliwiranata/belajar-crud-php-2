<?php
include 'config/koneksi.php';
include 'templates/header.php';
include 'templates/navbar.php';

$sql = "SELECT * FROM tb_kelas";
$result = mysqli_query($koneksi, $sql);

?>


<div class="container mt-5">
    <h3>Data Kelas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $row['nama_kelas'] ?></td>
                </tr>
                <?php $a++ ?>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php
include 'templates/footer.php';

?>