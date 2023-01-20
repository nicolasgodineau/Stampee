<?php

class ModelVille extends Crud
{

    protected $table = 'Ville';
    protected $primaryKey = 'idVille';
    protected $fillable = ['idVille', 'ville'];
}