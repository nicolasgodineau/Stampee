<?php

class ModelEnchere extends Crud
{

    protected $table = 'Enchere';
    protected $primaryKey = ['Membre_idMembre','Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre', 'Timbre_idTimbre','Timer_idTimer'];

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

    public function selectEnchereMembre($value){
        $sql =  "SELECT
        Timbre.idTimbre,
        Timbre.nom,
        Mise.mise
        FROM
            Timbre
        INNER JOIN Enchere ON idTimbre = Timbre_idTimbre
        INNER JOIN Membre ON idMembre = Membre_idMembre
        INNER JOIN Mise ON Enchere_Timbre_idTimbre= Timbre_idTimbre
        WHERE
        idMembre = $value";
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
        Timer.date
    FROM
        Timbre
    INNER JOIN Enchere ON idTimbre = Timbre_idTimbre
    INNER JOIN Membre ON idMembre = Membre_idMembre
    INNER JOIN Image ON Image_idImage = idImage
    INNER JOIN Mise ON Enchere_Timbre_idTimbre = Timbre_idTimbre
    left JOIN Timer ON idTimer = Timer_idTimer";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectEnchere($id){

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
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }

}