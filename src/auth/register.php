<?php

$title = 'registrasi';
require '../layouts/header.php';

require '../app.php';

if (isset($_POST['submit'])) {

    if (register($_POST) > 0) {
        header("location:login.php");
    } else {
        $error = true;
    }
}

?>

<div class="col d-flex justify-content-center align-items-center mt-5">
    <div class="card w-50 shadow">
        <div class="card-header">
            <h5 class="card-title text-center">Registrasi</h5>
        </div>
        <div class="card-body">

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Maaf registrasi akun gagal
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="Nama Lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control mb-3" id="Nama Lengkap">

                <label for="foto" class="form-label">foto</label>
                <input type="file" name="foto" accept=".jpg, .jpeg, .png" class="form-control mb-3" id="foto">

                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control mb-3" id="email">

                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control mb-3" id="password">

                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary col-12">Submit</button>
                    </div>
                    <div class="col">
                        <a href="login.php" class="btn btn-outline-primary col-12">Login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require '../layouts/footer.php'; ?>