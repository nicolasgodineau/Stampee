<?php

class ModelTimbre extends Crud
{

    protected $table = 'Timbre';
    protected $primaryKey = 'idTimbre';
    protected $fillable = ['idTimbre', 'nom','description'];
}