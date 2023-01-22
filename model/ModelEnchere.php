<?php

class ModelEnchere extends Crud
{

    protected $table = 'Enchere';
    protected $primaryKey = ['Membre_idMembre','Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre', 'Timbre_idTimbre'];
}