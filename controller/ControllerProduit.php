<?php

RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelProduit');

class ControllerProduit
{

    public function create()
    {
        CheckSession::sessionAuth();
        twig::render('produit-create.php');
    }

    public function store()
    {
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(100);
        $validation->name('prix')->value($prix)->pattern('int')->required();


        if ($validation->isSuccess()) {
            $produit = new ModelProduit;
            $insertProduit = $produit->insert($_POST);
            twig::render('home-index.php');
        } else {
            $errors = $validation->displayErrors();
            twig::render('produit-create.php', ['errors' => $errors, 'data' => $_POST]);
        }
    }
}