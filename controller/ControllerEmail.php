<?php
RequirePage::requireModel('Email');
class ControllerEmail
{
    public function email()
    {
        $email = new Email();
        $email->sendMail();
    }
}