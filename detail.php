<?php require_once "app/init.php"; ?>

<?php


$mahasiswa = new Mahasiswa();
$id_mhs = $_GET['id_mhs'];

$mhs = $mahasiswa->getMahasiswaById($id_mhs);

?>

<?php require_once "app/template/header.php"; ?>


<div class="container mt-5"><br>
    <div class="row">
        <div class="col-6">
            <h3>Detail Mahasiswa</h3>
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= ucwords($mhs['nama']) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= ucwords($mhs['no_telp']) ?></h6>
                    <p class="card-text"><?= ucwords($mhs['alamat']) ?></p>
                    <p class="card-text"><?= ucwords($mhs['asal_sekolah']) ?></p>
                    <a href="mahasiswa.php" class="btn btn-outline-warning" style="float: right;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "app/template/footer.php"; ?>