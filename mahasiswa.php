<?php require_once "app/init.php";



if (!Session::exist('username')) {
    header("location: login.php");
}



@$page = $_GET['page'];

$mahasiswa = new Mahasiswa;

$pagination = new Pagination;

$data = $mahasiswa->getAllMahasiswa();
$number = $pagination->paginate($data, 5);
$result = $pagination->fetchResult();
$counts = $pagination->count();
$start = $pagination->starts();
$total = $pagination->total_values();


?>

<?php require_once "app/template/header.php"; ?>

<div class="container mt-5"><br>

    <div class="row">
        <div class="col-lg-6">

            <?php

            Flasher::get();

            ?>

        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="tambah.php" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <form action="mahasiswa.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="search">
                    <div class="input-group-append">
                        <input class="btn btn-secondary" type="submit" name="cari">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php

    if (Input::get('cari')) {
        $result = $mahasiswa->search(Input::get('keyword'));
    }

    ?>

    <div class="row">
        <div class="col-lg-12">
            <h3>Daftar Mahasiswa</h3>

            <table class="table table-striped">
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Asal Sekolah</th>
                    <th style="text-align: center;">Action</th>
                </tr>

                <?php

                $no = 1;
                $no = $start + 1;
                foreach ($result as $mhs) :

                ?>

                    <tr style="text-align: center;">
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['alamat']; ?></td>
                        <td><?= $mhs['no_telp']; ?></td>
                        <td><?= $mhs['asal_sekolah']; ?></td>
                        <td style="text-align: center;">
                            <a href="update.php?id_mhs=<?= $mhs['id_mhs']; ?>" class="btn btn-success btn-sm">Update</a>

                            <a onclick="confirm('Yakin ingin menghapus data..??')" href="delete.php?id_mhs=<?= $mhs['id_mhs']; ?>" class="btn btn-danger btn-sm">Delete</a>

                            <a href="detail.php?id_mhs=<?= $mhs['id_mhs']; ?>" class="btn btn-warning btn-sm">Detail</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>

            <i>Showing <?= $start + 1 ?> to <?= --$no; ?> from <?= $total; ?> </i>

            <nav aria-label="..." style="float: right;">
                <ul class="pagination mt-3">

                    <?php

                    if ($page > 1) {
                        $link = $page - 1;
                        echo "
                                <li class='page-item'>
                                    <a class='page-link' href='?page=$link '>Previous</a>
                                </li>
                            ";
                    } else {

                        echo "
                                <li class='page-item disable'>
                                    <a class='page-link'>Previous</a>
                                </li>
                            ";
                    }

                    ?>


                    <?php foreach ($number as $num) :

                        if ($page != $num) {
                            echo "
                                <li class='page-item'>
                                    <a class='page-link' href='?page=$num'>$num </a>
                                </li>
                            ";
                        } else {

                            echo "
                                <li class='page-item active'>
                                    <a class='page-link' href='?page=$num'>$num </a>
                                </li>
                            ";
                        }

                    endforeach; ?>

                    <?php

                    if ($page < $counts) {
                        $link = $page + 1;
                        echo "
                                <li class='page-item'>
                                    <a class='page-link' href='?page=$link'>Next</a>
                                </li>
                             ";
                    } else {

                        echo "
                                <li class='page-item disable'>
                                    <a class='page-link'>Next</a>
                                </li>
                             ";
                    }

                    ?>

                </ul>
            </nav>

        </div>
    </div>
</div>

<?php require_once "app/template/footer.php"; ?>