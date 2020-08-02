<?php

require_once "app/init.php";


if (!Session::exist('username')) {
    header("location: login.php");
}

$mahasiswa = new Mahasiswa;

$username = $_GET['username'];
$data = $mahasiswa->getMahasiswaByName($username);

?>


<?php require_once "app/template/header.php"; ?>


<div class="container mt-5"><br>
    <div class="row">
        <div class="col-6">
            <h3>Detail Mahasiswa</h3>
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <h4><?= ucwords($data['username']) ?></h4><br>
                    <h5 class="card-title">Username : <?= $data['username'] ?></h5>
                    <h5 class="card-title">Password : <?= $data['password'] ?></h5>
                    <a href="about.php" style="float: right;" class="btn btn-outline-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once "app/template/footer.php"; ?>