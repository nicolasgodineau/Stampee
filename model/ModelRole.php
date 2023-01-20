<?php

class ModelRole extends Crud
{

    protected $table = 'Role';
    protected $primaryKey = 'idRole';
    protected $fillable = ['idRole', 'role'];
}