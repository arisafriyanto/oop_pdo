<?php require_once "app/init.php"; ?>

<?php

$errors = [];

if (Input::get('register')) {

    // 1. MEMBUAT OBJECT VALIDATION

    $validation = new Validation();

    // 2. MEMANGGIL METHODE CHECK

    $validation = $validation->check([
        'username' =>  [
            'required' => true,
            'min'      => 3,
            'max'      => 50
        ],
        'password' =>  [
            'required' => true,
            'min'      => 5
        ]
    ]);

    // 3. LOLOS VALIDASI

    if ($validation->passed()) {

        if ($user->cek_nama_register(Input::get('username'))) {

            $user->register_user(Input::get('username'), password_hash(Input::get('password'), PASSWORD_DEFAULT));
            header("location: login.php");
        } else {
            $errors[] = "Username sudah terdaftar";
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

            <?php

            foreach ($errors as $error) {
                Flasher::set($error, "Register Gagal...!", "danger");
                Flasher::get();
            }

            ?>

        </div>
    </div>

    <h2 class="mb-5 ml-3">Register</h2>

    <form action="register.php" method="post">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <input type="submit" name="register" value="Daftar Sekarang" class="btn btn-success">
            <a href="login.php" class="btn btn-primary">Login</a>

        </div>

    </form>

</div>

<?php require_once "app/template/footer.php"; ?>