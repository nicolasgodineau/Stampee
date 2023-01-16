<?php

class ModelMembre extends Crud
{

    protected $table = 'Membre';
    protected $primaryKey = 'idMembre';

    protected $fillable = ['idMembre', 'nom', 'prenom','adresse','telephone','email', 'password','Role_idRole'];

    public function checkUser($data)
    {

        extract($data);
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        echo '<pre>';
        print_r($sql);
        echo '</pre>';
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();

        if ($count == 1) {
            $user_info = $stmt->fetch();
            if (password_verify($password, $user_info['password'])) {

                session_regenerate_id();

                requirePage::redirectPage('../book', ['user_info' => $user_info]);
            } else {
                return "<ul><li>Verifier le mot de passe</li></ul>";
            }
        } else {
            return "<ul><li>Le non d'utilisateur n'existe pas</li></ul>";
        }
    }
}