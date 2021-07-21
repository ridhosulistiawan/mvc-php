<?php

class Mahasiswa_model {
    private $dbh; //database handler
    private $stmt;
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($post) {
        $query = "INSERT INTO ". $this->table . " VALUES 
                    ('', :nama, :nim, :email, :prodi)";
        $this->db->query($query);

        $this->db->bind('nama', $post['nama']);
        $this->db->bind('nim', $post['nim']);
        $this->db->bind('email', $post['email']);
        $this->db->bind('prodi', $post['prodi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $query = 'DELETE FROM mahasiswa WHERE id=:id';
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    
    public function ubahMahasiswa($post) {
        $query = "UPDATE ". $this->table . " SET 
                    nama = :nama, 
                    nim = :nim, 
                    email = :email, 
                    prodi = :prodi
                    
                    WHERE id = :id";
        $this->db->query($query);

        $this->db->bind('nama', $post['nama']);
        $this->db->bind('nim', $post['nim']);
        $this->db->bind('email', $post['email']);
        $this->db->bind('prodi', $post['prodi']);
        $this->db->bind('id', $post['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ". $this->table . " WHERE nama LIKE :keyword";
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}