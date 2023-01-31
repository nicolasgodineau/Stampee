<?php

class ModelFavoris extends Crud
{

    protected $table = 'Favoris';
    protected $primaryKey = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];

    public function showFavoris($idMembre){
        $sql = "SELECT `Enchere_Timbre_idTimbre` FROM `Favoris` WHERE `Membre_idMembre` = $idMembre";
        $stmt  = $this->query($sql);
        
        return  $stmt->fetchAll();
    }
}