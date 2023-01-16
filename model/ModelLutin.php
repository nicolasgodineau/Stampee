<?php

class ModelLutin extends Crud
{

    protected $table = 'lutin';
    protected $primaryKey = 'idLutin';

    protected $fillable = ['idLutin', 'prenom', 'pays'];
}