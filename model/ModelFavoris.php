<?php

class ModelFavoris extends Crud
{

    protected $table = 'Favoris';
    protected $primaryKey = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    protected $fillable = ['Membre_idMembre','Enchere_Membre_idMembre','Enchere_Timbre_idTimbre'];
    
    public function addFavoris($id){

    }
}