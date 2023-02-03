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


class ControllerMise
{
    public function ajouterMise()
    {
        if ($_POST['mise'] > $_POST['miseAvant']){
            $mise = new ModelMise;
            $miseUpdate = $mise->updateMise($_POST);
            $redirection = "../enchere/show/" . $_POST['Timbre_idTimbre'] ;
            RequirePage::redirectPage($redirection);
        }else{
            $redirection = "../enchere/show/" . $_POST['Timbre_idTimbre'] ;
            RequirePage::redirectPage($redirection );
            die();
        }
    }
}