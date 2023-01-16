<?php

class ModelBook extends Crud
{

    protected $table = 'enfant';
    protected $primaryKey = 'idEnfant';

    protected $fillable = ['idEnfant', 'nom', 'prenom', 'pays_id', 'mereNoel_idMereNoel'];
}