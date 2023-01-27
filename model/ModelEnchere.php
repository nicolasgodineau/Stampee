<?php

class ModelEnchere extends Crud
{

    protected $table = 'Enchere';
    protected $primaryKey = ['Membre_idMembre','Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre', 'Timbre_idTimbre','Timer_idTimer','Status_idStatus'];

    public function show(){

    }
    
    public function insertEnchere($data){

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

    public function selectEnchereMembre($id){
        $sql =  "SELECT
        Timbre.idTimbre,
        Timbre.nom,
        Mise.mise,
        Timer.date,
        Status.idStatus
        FROM
            Timbre
        INNER JOIN Enchere ON idTimbre = Timbre_idTimbre
        INNER JOIN Membre ON idMembre = Membre_idMembre
        INNER JOIN Mise ON Enchere_Timbre_idTimbre= Timbre_idTimbre
        INNER JOIN Status ON Status_idStatus = idStatus
        left JOIN Timer ON idTimer = Timer_idTimer
        WHERE
        idMembre = $id";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
    
    public function selectAllEncheres(){
        $sql =  "SELECT
        Timbre.idTimbre,
        Timbre.nom,
        Timbre.description,
        Image.image,
        Membre.prenom,
        Membre.idMembre,
        Mise.mise,
        Enchere.Timer_idTimer,
        Timer.date,
        Status.idStatus
        FROM
            Timbre
        INNER JOIN Enchere ON idTimbre = Timbre_idTimbre
        INNER JOIN Membre ON idMembre = Membre_idMembre
        INNER JOIN Image ON Image_idImage = idImage
        INNER JOIN Mise ON Enchere_Timbre_idTimbre = Timbre_idTimbre
        INNER JOIN Status ON Status_idStatus = idStatus
        left JOIN Timer ON idTimer = Timer_idTimer";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectEnchere($id){
        $primaryKey = 'idTimbre';
        $sql =  "SELECT
        Timbre.idTimbre,
        Timbre.nom,
        Timbre.description,
        Image.image,
        Membre.idMembre,
        Mise.mise,
        Enchere.Timer_idTimer
    
        FROM
            Timbre
        INNER JOIN Enchere ON idTimbre = Timbre_idTimbre
        INNER JOIN Membre ON idMembre = Membre_idMembre
        INNER JOIN Image ON Image_idImage = idImage
        INNER JOIN Mise ON Enchere_Timbre_idTimbre= Timbre_idTimbre
        WHERE
        Timbre.idTimbre = $id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue($primaryKey, $id);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }

    public function changeStatus($timbre){
        $sql = "UPDATE `Enchere` SET `Status_idStatus` = 3 WHERE Timbre_idTimbre = $timbre";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$key", $value);

        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return true;
        }
    }

    public function deleteEnchere($id)
    {
        $sql = "DELETE FROM `Enchere` WHERE `Timbre_idTimbre` = $id";
        
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            return true;
        }
    }

}