<?php require_once "app/init.php"; ?>

<?php

if (Session::exist('username')) {
    header("location: home.php");
}

$errors = [];

if (Input::get('login')) {

    $validation = new Validation();

    $validation = $validation->check([
        'username' => [
            'required' => true
        ],
        'password' => [
            'required' => true
        ]
    ]);


    if ($validation->passed()) {

        if ($user->cek_nama(Input::get('username'))) {

            if ($user->login_user(Input::get('username'), Input::get('password'))) {
                Session::set('username', Input::get('username'));
                header("location: home.php");
            } else {
                $errors[] = "Password yang anda masukkan salah";
            }
        } else {
            $errors[] = "Username belum terdaftar";
        }
    } else {
        $errors = $validation->errors();
    }
}

?>

<?php require_once "app/template/header.php"; ?>

<div class="container mt-5"><br>

    <div class="row">
        <div class="col-lg-6">
            <!-- Flasher -->

            <?php

            foreach ($errors as $error) {
                Flasher::set($error, "Login Gagal...!", "danger");
                Flasher::get();
            }

            ?>

        </div>
    </div>


    <h2 class="mb-5 ml-3">Login</h2>

    <form action="login.php" method="post">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <input type="submit" name="login" value="Login" class="btn btn-primary">
            <a href="register.php" class="btn btn-secondary">Daftar Sekarang</a>

        </div>

    </form>

</div>

<?php require_once "app/template/footer.php"; ?>