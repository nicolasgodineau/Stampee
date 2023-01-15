<?php

abstract class Crud extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=stempee; port=8889; charset=utf8', 'root', 'root');
    }

    public function select($champ = 'id', $order = 'ASC')
    {
        $sql = "SELECT * FROM $this->table ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectId($value)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }

    public function userExists($username)
    {
        echo '<pre> fonction';
        print_r($username);
        echo '</pre>';
        /*         //prepared statements for added security
        $query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ?");
        //execute the query
        $query->execute([$username]);
        $rows = $query->fetchColumn();

        //if a row is returned...user already exists
        return ($rows > 0); */
    }

    public function selectUsername($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        /*         $username = $value['username'];
        $stmt = prepare("SELECT 1 FROM user where username=?");
        echo '<pre>';
        print_r($stmt);
        echo '</pre>';
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_row();
        if ($user) {
            $error[] = "This username is already taken!";
        } */
    }

    public function insert($data)
    {
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ", array_keys($data_map));
        $valeurChamp = ":" . implode(", :", array_keys($data_map));
        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        echo '<pre> fichier crud';
        print_r($sql);
        echo '</pre>';
        $stmt = $this->prepare($sql);
        echo '<pre>';
        print_r($stmt);
        echo '</pre>';
        foreach ($data_map as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
            die();
        } else {
            return $this->lastInsertId();
        }
    }

    public function update($data)
    {
        $champRequete = null;
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        foreach ($data_map as $key => $value) {
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        foreach ($data_map as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return true;
        }
    }

    public function delete($id)
    {

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            return true;
        }
    }
}