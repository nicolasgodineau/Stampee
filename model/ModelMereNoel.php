<?php

class ModelMerenoel extends Crud
{

    protected $table = 'mereNoel';
    protected $primaryKey = 'idMereNoel';

    protected $fillable = ['idMereNoel', 'prenom', 'pays'];
}