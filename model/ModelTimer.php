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

    public function addDate($date)
    {

        $sql="SELECT * FROM `Timer` WHERE date = '$date'";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        $stmt->execute();
        $count = $stmt->rowCount();


        if ($count == 1) {
            return $stmt->fetch();
        } else {
            echo "0 fois la date";
            $sql = "INSERT INTO `Timer`(`date`) VALUES ('$date')";
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
            //header("location: ../../home/error");
        }

    }
}