<?php

session_start();

$title = 'Login';
require '../layouts/header.php';

require '../app.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($result) === 1) {

        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $_GET['id_user'];

        header("location:../index.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<div class="col d-flex justify-content-center align-items-center mt-5">
    <div class="card w-50 shadow">
        <div class="card-header">
            <h5 class="card-title text-center">Login</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control mb-3" id="email">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control mb-3" id="password">
                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-primary col-12">Login</button>
                    </div>
                    <div class="col">
                        <a href="register.php" class="btn btn-outline-primary col-12">Registerasi</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require '../layouts/footer.php'; ?>