<?php

namespace services;

class collaborators
{

    public function postCollaborators($request)
    {
       require 'conexão.php';

       $name = $request['name'];
       $phone = $request['phone'];
       $cpf = $request['cpf'];

       $collaborators_query = "INSERT INTO collaborators(name,phone,cpf) VALUES($name, $phone, $cpf)";
       $collaborators_response = $connection->query($collaborators_query);

    }
}
