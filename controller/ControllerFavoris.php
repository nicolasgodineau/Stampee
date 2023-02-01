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
    public function ajouter()
    {

        $favoris = New ModelFavoris;
        $addFavoris = $favoris->insert($_POST);
        if ($_POST['emplacement'] == 'fiche') {
            // Permet de faire une redirection sur la page du timbre
            $redirection = "../enchere/show/" . $_POST['Enchere_Timbre_idTimbre'] ;
            RequirePage::redirectPage($redirection);
        }else{
            RequirePage::redirectPage('../enchere/index');
        }
        
    }

    public function supprimer()
    {

        $favoris = New ModelFavoris;
        $deleteFavoris = $favoris->supprimerFavoris($_POST);
        if ($_POST['emplacement'] == 'fiche') {
            // Permet de faire une redirection sur la page du timbre
            $redirection = "../enchere/show/" . $_POST['Enchere_Timbre_idTimbre'] ;
            RequirePage::redirectPage($redirection);
        }else{
            RequirePage::redirectPage('../enchere/index');
        }
    }
}