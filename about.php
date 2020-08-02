<?php require_once "app/init.php"; ?>

<?php

if (!Session::exist('username')) {
    header("location: login.php");
}

$username = Session::get('username');

?>

<?php require_once "app/template/header.php"; ?>

<div class="container mt-4"><br>
    <div class="jumbotron mt-4">
        <h1 class="display-5"> About Me</h1>
        <img src="assets/img/aff.jpg" alt="Aris Afriyanto" width="180" class="rounded-circle">
        <p class="lead">Hii, my name is <?= ucwords(Session::get('username')); ?></p>
        <hr class="my-4">
        <p class="lead">
            <a href="account_detail.php?username=<?= $username; ?>" class="btn btn-primary">Account Detail</a>
        </p>
    </div>
</div>

<?php require_once "app/template/footer.php"; ?>