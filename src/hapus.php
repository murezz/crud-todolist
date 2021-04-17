<?php

require 'app.php';

$id_barang = $_GET['id_barang'];

$hapus = mysqli_query($conn, "DELETE FROM barang WHERE id_barang = '$id_barang'");

if ($hapus > 0) {
    header("location:index.php");
} else {
    $error = true;
}

?>

<?php if (isset($error)) : ?>
    <section>
        <div class="text-center mt-5">
            <img src="../assets/img/failed.svg" width="500px" alt="">
            <h1 class="text-danger">Gagal menghapus data</h1>
            <a href="index.php" class="text-decoration-none">Kembali</a>
        </div>
    </section>
<?php endif; ?>