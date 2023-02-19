<?php

namespace services;

class Prices
{

    public function getPrices()
    {
        require 'Conexao.php';

        $prices_query = "SELECT * FROM precos";
        $prices_response = $mysqli->query($prices_query);
        return $prices_response;
    }

    public function postPrices($request)
    {
        require 'Conexao.php';

        $description = $mysqli->escape_string($request['description']);
        $value = $mysqli->escape_string($request['value']);

        $create_query = "INSERT INTO precos (descricao, valor) VALUES ('$description', '$value')";
        $create_response = $mysqli->query($create_query);

        if ($create_response == true) {
            session_start();
            $_SESSION['register_prices_success'] = true;
            header('Location: ../pages/areaPrices.php');
        } else {
            session_start();
            $_SESSION['register_prices_fail'] = true;
            header('Location: ../pages/areaPrices.php');
        }
    }

    public function putPrices($request)
    {
        require 'Conexao.php';

        $id = $mysqli->escape_string($request['id']);
        $value = $mysqli->escape_string($request['value']);

        $update_query = "UPDATE precos SET valor = '$value' WHERE id = $id";
        $update_response = $mysqli->query($update_query);

        if ($update_response == true) {
            session_start();
            $_SESSION['edit_prices_success'] = true;
            header('Location: ../pages/areaPrices.php');
        } else {
            session_start();
            $_SESSION['edit_prices_fail'] = true;
            header('Location: ../pages/areaPrices.php');
        }
    }

    public function deletePrices($id)
    {
        require 'Conexao.php';

        $delete_query = " DELETE FROM precos WHERE id = $id";
        $delete_response = $mysqli->query($delete_query);

        if ($delete_response == true) {
            session_start();
            $_SESSION['delete_prices_success'] = true;
            header('Location: ../pages/areaPrices.php');
        } else {
            session_start();
            $_SESSION['delete_prices_fail'] = true;
            header('Location: ../pages/areaPrices.php');
        }
    }
}
