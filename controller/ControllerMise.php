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
        $mise = new ModelMise;
        $miseUpdate = $mise->updateMise($_POST);

        $redirection = "../enchere/show/" . $_POST['Timbre_idTimbre'] ;
        RequirePage::redirectPage($redirection);
    }
}