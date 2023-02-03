<?php

class ModelMise extends Crud
{

    protected $table = 'Mise';
    protected $primaryKey = 'idMise';
    protected $fillable = ['idMise', 'mise','Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    
    public function insertMise($data){

        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data_map as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 

        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            die();
        }else{
            return $this->lastInsertId();
        }
    }

    public function lastMise($idTimbre){
        $sql = "SELECT Mise.mise FROM `Mise` WHERE Mise.Enchere_Timbre_idTimbre = $idTimbre ORDER BY Mise.idMise DESC LIMIT 1 ";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }

    public function updateMise($data){
        $mise = $data['mise'];
        $idMembre = $data['Membre_idMembre'];
        $idTimbre = $data['Timbre_idTimbre'];

        $sql = "UPDATE `Mise` SET `Mise` = $mise, `Membre_idMembre` = $idMembre WHERE `Enchere_Timbre_idTimbre` = $idTimbre";

        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return true;
        }
    }
}