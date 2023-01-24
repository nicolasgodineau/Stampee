<?php

class ModelPays extends Crud
{

    protected $table = 'Pays';
    protected $primaryKey = 'idPays';

    protected $fillable = ['idPays', 'pays'];


    public function selectPaysMembre(){
        $sql="SELECT
        pays,
        Membre.idMembre
            FROM
        pays
            INNER JOIN Membre ON Pays_idPays = idPays";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
        }
}