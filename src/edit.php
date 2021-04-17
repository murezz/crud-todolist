<?php

$title = 'Edit';
require 'layouts/header.php';
require 'app.php';

$id_barang =  $_GET['id_barang'];

$result = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = $id_barang");

if (isset($_POST['submit'])) {

    if (edit($_POST) > 0) {
        header("location:index.php");
    } else {
        $error = true;
    }
}

?>

<div class="col d-flex justify-content-center align-items-center m-5">
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Edit barang</h5>
        </div>
        <div class="card-body">
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Maaf gagal untuk mengedit barang
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <label for="nama" class="form-label">Nama barang</label>
                    <input type="text" name="nama_barang" class="form-control mb-3" id="nama" value="<?= $row['nama_barang']; ?>">

                    <label for="foto" class="form-label">Masukkan foto</label>
                    <input type="file" name="foto_barang" class="form-control mb-3" id="foto" value="<?= $row['foto_barang']; ?>">

                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" min="0" name="harga" class="form-control mb-3" id="harga" value="<?= $row['harga']; ?>">

                    <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                    <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">

                    <button type="submit" name="submit" class="btn btn-success">Ubah</button>
                    <a href="index.php" class="btn btn-secondary text-decoration-none">Batal</a>
                <?php endwhile; ?>
            </form>
        </div>
    </div>
</div>


<?php require 'layouts/footer.php'; ?>