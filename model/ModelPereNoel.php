<?php

class ModelPerenoel extends Crud
{

    protected $table = 'pereNoel';
    protected $primaryKey = 'idPereNoel';

    protected $fillable = ['idPereNoel', 'nom', 'pays'];
}