<?php require_once "app/init.php"; ?>

<?php

if (!Session::exist('username')) {
    header("location: login.php");
}

?>

<?php require_once "app/template/header.php"; ?>

<div class="container mt-4"><br>

    <div class="row">
        <div class="col-lg-6">
        </div>
    </div>

    <div class="jumbotron mt-4">
        <h1 class="display-5">Welcome To My Websait</h1>
        <p class="lead">Hii, My name is <?= ucwords(Session::get('username')); ?></p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="home.php" role="button">Learn more</a>
        </p>
    </div>
</div>

<?php require_once "app/template/footer.php"; ?>