<?php

class ModelStatus extends Crud
{

    protected $table = 'Status';
    protected $primaryKey = 'idStatus';
    protected $fillable = ['idStatus', 'status'];


}