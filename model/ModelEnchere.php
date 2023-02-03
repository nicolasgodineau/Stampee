<?php

class ModelEnchere extends Crud
{

    protected $table = 'Enchere';
    protected $primaryKey = ['Membre_idMembre','Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre', 'Timbre_idTimbre','Status_idStatus','dateFin'];

    
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
        $sql =  "SELECT Timbre.idTimbre, Timbre.nom, Mise.mise, Status.idStatus FROM Timbre INNER JOIN Enchere ON idTimbre = Timbre_idTimbre INNER JOIN Membre ON idMembre = Membre_idMembre INNER JOIN Mise ON Enchere_Timbre_idTimbre= Timbre_idTimbre INNER JOIN Status ON Status_idStatus = idStatus WHERE idMembre = $id";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }
    
    public function selectAllEncheres(){

        $sql =  "SELECT Image.image, Timbre.*, Enchere.*, Membre.idMembre, Membre.prenom, Mise.*, Status.idStatus FROM Image INNER JOIN Timbre ON Timbre.idTimbre = Image.Timbre_idTimbre INNER JOIN Enchere ON Enchere.Timbre_idTimbre = Timbre.idTimbre INNER JOIN Membre ON Membre.idMembre = Enchere.Membre_idMembre INNER JOIN Status ON Status_idStatus = idStatus INNER JOIN Mise on Mise.Enchere_Timbre_idTimbre = Enchere.Timbre_idTimbre ";
        $stmt  = $this->query($sql);
        $stmt->execute();

        return  $stmt->fetchAll();
    }

    public function selectEnchere($id){
        $primaryKey = 'idTimbre';
        $sql =  "SELECT
            Image.image,
            Timbre.*,
            Enchere.*,
            Mise.mise
        FROM
            Image
        INNER JOIN Timbre ON Timbre.idTimbre = Image.Timbre_idTimbre
        INNER JOIN Enchere ON Enchere.Timbre_idTimbre = Timbre.idTimbre
        INNER JOIN Membre ON Membre.idMembre = Enchere.Membre_idMembre
        INNER JOIN Mise on Mise.Enchere_Membre_idMembre = Enchere.Membre_idMembre
            WHERE
            Timbre.idTimbre = $id
            ORDER BY Mise DESC LIMIT 1";
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

    public function filtre($filtre){

        $min = $filtre['prix_minimum'];
        $max = $filtre['prix_maximum'];

        $sql =  "SELECT Timbre.idTimbre, Timbre.nom, Timbre.description, Membre.prenom, Membre.idMembre, Mise.mise, Status.idStatus FROM Timbre INNER JOIN Enchere ON idTimbre = Timbre_idTimbre INNER JOIN Membre ON idMembre = Membre_idMembre INNER JOIN Mise ON Enchere_Timbre_idTimbre = Timbre_idTimbre INNER JOIN Status ON Status_idStatus = idStatus
        WHERE Mise.mise BETWEEN $min and $max";

        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    } 

}