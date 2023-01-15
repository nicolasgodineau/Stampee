<?php

class ModelProduit extends Crud
{

    protected $table = 'produit';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'nom', 'description', 'prix'];
}