<?php

class ModelPays extends Crud
{

    protected $table = 'Pays';
    protected $primaryKey = 'idPays';

    protected $fillable = ['idPays', 'pays'];



}