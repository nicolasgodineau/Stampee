<?php

class ModelRole extends Crud
{

    protected $table = 'Role';
    protected $primaryKey = 'idRole';
    protected $fillable = ['idRole', 'role'];
    /* Boucle et selectionne juste les fillable au cas ou nous aurions plus d'un filed set intégrés* */
}