<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');
RequirePage::requireModel('ModelVille');

class ControllerClient
{

    public function index()
    {
        print_r($_SESSION);
        // die();
        // CheckSession::sessionAuth();
        $client = new ModelClient;
        $select = $client->select();
        echo '<pre>';
        print_r($select);
        echo '</pre>';
        twig::render("client-index.php", [
            'clients' => $select,
            'client_list' => "Liste de Client"
        ]);
    }

    public function create()
    {
        CheckSession::sessionAuth();
        twig::render('client-create.php');
    }

    public function store()
    {

        $validation = new Validation;

        //$validation->name('nom')->value($_POST['nom'])
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
        $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);


        if ($validation->isSuccess()) {
            $ville = new ModelVille;
            $insertVille = $ville->insert($_POST);
            $_POST['ville_id'] = $insertVille;
            $client = new ModelClient;
            $insertClient = $client->insert($_POST);
            requirePage::redirectPage('client');
        } else {
            $errors = $validation->displayErrors();
            twig::render('client-create.php', ['errors' => $errors, 'data' => $_POST]);
        }
    }

    public function show($id)
    {
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        twig::render('client-show.php', ['client' => $selectClient]);
    }

    public function edit($id)
    {
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        $ville = new ModelVille;
        $selectVille = $ville->select("ville");
        twig::render('client-edit.php', ['client' => $selectClient, 'villes' => $selectVille]);
    }

    public function update()
    {

        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
        $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);

        if ($validation->isSuccess()) {
            $client = new ModelClient;
            $update = $client->update($_POST);
            RequirePage::redirectPage('client/show/' . $_POST['id']);
        } else {
            $errors = $validation->displayErrors();
            $ville = new ModelVille;
            $selectVille = $ville->select("ville");
            twig::render('client-edit.php', ['errors' => $errors, 'client' => $_POST, 'villes' => $selectVille]);
        }
    }
    public function delete()
    {
        $client = new ModelClient;
        $delete = $client->delete($_POST['id']);
        RequirePage::redirectPage('client');
    }
}