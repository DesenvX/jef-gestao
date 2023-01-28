<?php

namespace functions;

class Validations
{
    public function ValidateCpf($cpf)
    {
        if (strlen($cpf) != 11) {
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        $dv_informado = substr($cpf, -2);
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }
        $resto = $soma % 11;
        if ($resto < 2) {
            $dv = 0;
        } else {
            $dv = 11 - $resto;
        }
        if ($dv != $cpf[9]) {
            return false;
        }
        $soma = 0;
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }
        $resto = $soma % 11;
        if ($resto < 2) {
            $dv = 0;
        } else {
            $dv = 11 - $resto;
        }
        if ($dv != $cpf[10]) {
            return false;
        }
        return true;
    }
}
