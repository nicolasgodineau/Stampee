<?php

class ModelPays extends Crud
{

    protected $table = 'pays';
    protected $primaryKey = 'idPays';

    protected $fillable = ['idPays', 'nom'];
}