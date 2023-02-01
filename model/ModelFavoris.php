<?php

class ModelFavoris extends Crud
{

    protected $table = 'Favoris';
    protected $primaryKey = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];

    public function afficherFavoris($idMembre){
        $sql = "SELECT `Enchere_Timbre_idTimbre` FROM `Favoris` WHERE `Membre_idMembre` = $idMembre";
        $stmt  = $this->query($sql);
        
        return  $stmt->fetchAll();
    }

    public function conterFavoris($idTimbre){
        $sql = "SELECT `Enchere_Timbre_idTimbre` FROM `Favoris` WHERE `Enchere_Timbre_idTimbre` = $idTimbre";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function supprimerFavoris($data){
        $idMembre = $data['Membre_idMembre'];
        $idTimbre = $data['Enchere_Timbre_idTimbre'];
        $sql = "DELETE FROM `Favoris` WHERE `Favoris`.`Membre_idMembre` = $idMembre AND `Favoris`.`Enchere_Timbre_idTimbre` = $idTimbre";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            return true;
        }
    }
}