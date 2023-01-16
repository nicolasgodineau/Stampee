<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelFiche');

class ControllerEnchere
{
    public function index()
    {
    twig::render("enchere-index.php");
    }
}