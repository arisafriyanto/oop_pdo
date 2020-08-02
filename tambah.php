<?php require_once "app/init.php"; ?>

<?php
$errors = [];

if (Input::get('tambah_mahasiswa')) {


    $mahasiswa = new Mahasiswa;

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

    if ($validation->passed()) {
        if ($mahasiswa->insert_mhs(ucwords(Input::get('nama')), ucwords(Input::get('alamat')), ucwords(Input::get('no_telp')), ucwords(Input::get('asal_sekolah')))) {
            Flasher::set("Tambah Data Mahasiswa", "Berhasil...!", "primary");
            header("location: mahasiswa.php");
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
                Flasher::set($error, "Tambah Mahasiswa Gagal...!", "danger");
                Flasher::get();
            }

            ?>

        </div>
    </div>

    <h2 class="mb-4 ml-3">Tambah Mahasiswa</h2>

    <form action="tambah.php" method="post">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Aris Afriyanto">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Greenthink" id="" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="0895360759393">
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Smks Bina Islam Mandiri Kersana">
            </div>

            <input type="submit" name="tambah_mahasiswa" value="Tambah Mahasiswa" class="btn btn-primary">
            <a href="mahasiswa.php" class="btn btn-danger">Back</a>

        </div>

    </form>

</div>
<?php require_once "app/template/footer.php"; ?>