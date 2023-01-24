<?php

class ModelFavoris extends Crud
{

    protected $table = 'Favoris';
    protected $primaryKey = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    
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
}