<?php

class ModelEnchere extends Crud
{

    protected $table = 'Enchere';
    protected $primaryKey = ['Membre_idMembre','Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre', 'Timbre_idTimbre'];
    
    public function insertEnchere($data){
        echo '<pre> enchere';
        print_r($data);
        echo '</pre>';
        
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        echo '<pre>';
        print_r($sql);
        echo '</pre>';

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