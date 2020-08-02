<?php require_once "app/init.php"; ?>

<?php
$errors = [];

$mahasiswa = new Mahasiswa;

$id_mhs = $_GET['id_mhs'];

$mhs = $mahasiswa->getMahasiswaById($id_mhs);


$validation = new Validation;

$validation = $validation->check([
    'nama' => [
        'required' => true,
        'min'     => 3,
        'max'     => 30
    ],
    'alamat' => [
        'required' => true,
        'min'     => 5,
        'max'     => 200
    ],
    'no_telp' => [
        'required' => true,
        'min'     => 11
    ],
    'asal_sekolah' => [
        'required' => true,
        'max'     => 50
    ]
]);

if (Input::get('update_mahasiswa')) {

    if ($validation->passed()) {


        $mahasiswa->update_mhs(ucwords(Input::get('nama')), ucwords(Input::get('alamat')), ucwords(Input::get('no_telp')), ucwords(Input::get('asal_sekolah')), ucwords(Input::get('id_mhs')));
        Flasher::set("Update Data Mahasiswa", "Berhasil...!", "primary");
        header("location: mahasiswa.php");
    } else {

        $errors = $validation->errors();
    }
}


require_once "app/template/header.php";

?>

<div class="container mt-5"><br>

    <div class="row">
        <div class="col-lg-6">

            <?php

            foreach ($errors as $error) {
                Flasher::set($error, "Update Gagal...!", "danger");
                Flasher::get();
            }

            ?>

        </div>
    </div>

    <h2 class="mb-4 ml-3">Update Mahasiswa</h2>

    <form action="update.php?id_mhs=<?= $mhs['id_mhs'] ?>" method="post">
        <input type="hidden" name="id_mhs" value="<?= $mhs['id_mhs'] ?>">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'] ?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Greenthink" id="" class="form-control"><?= $mhs['alamat'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $mhs['no_telp'] ?>">
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $mhs['asal_sekolah'] ?>">
            </div>

            <input type="submit" name="update_mahasiswa" value="Update Mahasiswa" class="btn btn-primary">
            <a href="mahasiswa.php" class="btn btn-danger">Back</a>

        </div>

    </form>

</div>

<?php require_once "app/template/footer.php"; ?>