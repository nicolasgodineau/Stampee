<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelBook');
RequirePage::requireModel('ModelPays');

class ControllerBook
{

    public function index()
    {
        echo "text";
        CheckSession::sessionAuth();
        $enfant = new ModelBook;
        $select = $enfant->select();
        twig::render("book-index.php", [
            'enfants' => $select,
            'enfant_list' => "Liste d'enfants'"
        ]);
    }

    public function create()
    {
        CheckSession::sessionAuth();
        twig::render('book-create.php');
    }

    public function store()
    {
        $pays = new ModelPays;
        $insertPays = $pays->insert($_POST);
        $_POST['pays_id'] = $insertPays;
        $enfant = new ModelBook;
        $insertEnfant = $enfant->insert($_POST);
        RequirePage::redirectPage('../book');
    }

    public function show($id)
    {
        $enfant = new ModelBook;
        $select = $enfant->selectId($id);
        twig::render('book-show.php', ['enfant' => $select]);
    }

    public function edit($id)
    {
        $enfant = new ModelBook;
        $select = $enfant->selectId($id);
        twig::render('book-edit.php', ['enfant' => $select]);
    }

    public function update()
    {
        $enfant = new ModelBook;
        $update = $enfant->update($_POST);
        RequirePage::redirectPage('../book');
    }

    public function delete()
    {
        $enfant = new ModelBook;
        $delete = $enfant->delete($_POST['id']);
        RequirePage::redirectPage('../book');
    }
}