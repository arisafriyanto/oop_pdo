<?php

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $query = "select * from mhs order by nama asc ";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("select * from mhs where id_mhs = :id_mhs ");
        $this->db->bind('id_mhs', $id);
        $mhs = $this->db->single();
        return $mhs;
    }
    public function getMahasiswaByName($name)
    {
        $this->db->query("select * from users where username = :username");
        $this->db->bind('username', $name);
        return $this->db->single();
    }

    public function insert_mhs($nama, $alamat, $no_telp, $asal_sekolah)
    {
        $query = "insert into mhs values (null, :nama, :alamat, :no_telp, :asal_sekolah) ";
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('no_telp', $no_telp);
        $this->db->bind('asal_sekolah', $asal_sekolah);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_mhs($nama, $alamat, $no_telp, $asal_sekolah, $id_mhs)
    {
        $query = "update mhs set nama = :nama, alamat = :alamat, no_telp = :no_telp, asal_sekolah = :asal_sekolah where id_mhs = :id_mhs  ";
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('no_telp', $no_telp);
        $this->db->bind('asal_sekolah', $asal_sekolah);
        $this->db->bind('id_mhs', $id_mhs);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete_mhs($id_mhs)
    {
        $this->db->query("delete from mhs where id_mhs = :id_mhs ");
        $this->db->bind('id_mhs', $id_mhs);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function search($keyword)
    {
        $keyword = $_POST['keyword'];
        $query = "select * from mhs where nama like :keyword or alamat like :keyword or no_telp like :keyword or asal_sekolah like :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
