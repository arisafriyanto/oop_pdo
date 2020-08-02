<?php

require_once "app/init.php";

$mahasiswa = new Mahasiswa;

$id_mhs = $_GET['id_mhs'];

if ($mahasiswa->delete_mhs($id_mhs)) {
    Flasher::set("Delete Data Mahasiswa", "Berhasil...!", "primary");
    header("location: mahasiswa.php");
}
