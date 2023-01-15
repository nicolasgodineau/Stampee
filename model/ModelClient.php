<?php

class ModelClient extends Crud {

    protected $table = 'client';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'nom', 'adresse', 'postal_code', 'courriel', 'phone', 'ville_id'];

    
}

?>