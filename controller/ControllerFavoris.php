<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelImage');
RequirePage::requireModel('ModelMise');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelFavoris');
RequirePage::requireModel('ModelStatus');


class ControllerFavoris 
{
    public function ajout()
    {
        $favoris = New ModelFavoris;
        $addFavoris = $favoris->insert($_POST);
        RequirePage::redirectPage('../enchere/index');
    }
}