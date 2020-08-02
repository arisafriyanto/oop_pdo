<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        $this->db->query("select * from users");
        $result = $this->db->resultSet();

        foreach ($result as $data) {
            return $data;
        }
    }


    public function register_user($username, $password)
    {

        $query = "insert into users (username, password) values (:username, :password) ";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login_user($username, $password)
    {
        $query = "select * from users where username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        @$data = $this->db->single();

        if (password_verify(@$password, $data['password'])) return true;
        else return false;
    }

    public function cek_nama($username)
    {
        $query = "select * from users where username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        @$result = $this->db->single();


        if (@$username = $result['username']) return true;
        else return false;
    }

    public function cek_nama_register($username)
    {
        $query = "select * from users where username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $data = $this->db->single();

        if ($username = $data['username']) return false;
        else return true;
    }
}
