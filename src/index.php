<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("location: login.php");
    exit;
}

$title = 'Crud PHP';
require 'layouts/header.php';

require 'app.php';

$data = $_SESSION['email'];

$profile = mysqli_query($conn, "SELECT * FROM user WHERE email = '$data'");

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        header("location:index.php");
    } else {
        $failed = true;
    }
}

$barang = mysqli_query($conn, "SELECT * FROM barang INNER JOIN user ON barang.id_user = user.id_user WHERE email = '$data' ORDER BY id_barang DESC");


?>

<div class="col d-flex justify-content-center align-items-center mt-5">
    <div class="card w-50">
        <?php while ($row = mysqli_fetch_assoc($profile)) : ?>
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <img src="../assets/foto/<?= $row['foto']; ?>" width="40px" class="rounded-circle" alt="">
                        <h4 class="d-inline ms-2"><?= $row['nama']; ?></h4>
                    </div>
                    <div class="col-2 mt-auto">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <label for="nama" class="form-label">Nama barang</label>
                                            <input type="text" name="nama_barang" class="form-control mb-3" id="nama">

                                            <label for="foto" class="form-label">Masukkan foto</label>
                                            <input type="file" name="foto_barang" class="form-control mb-3" id="foto">

                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" min="0" name="harga" class="form-control mb-3" id="harga">

                                            <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($barang)) : ?>
                        <tr>
                            <th><?= $i; ?>.</th>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><img src="../assets/foto/<?= $row['foto_barang']; ?>" width="50px" alt=""></td>
                            <td>Rp. <?= $row['harga']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php require 'layouts/footer.php'; ?>