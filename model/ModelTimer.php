<?php

class ModelTimer extends Crud
{

    protected $table = 'Timer';
    protected $primaryKey = 'idTimer';
    protected $fillable = ['idTimer', 'date'];

    public function setTimer($id){

        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }
}