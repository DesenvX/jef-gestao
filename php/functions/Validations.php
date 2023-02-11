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

    public function ValidateCnpj($cnpj)
    {
        if (strlen($cnpj) <> 14) return 0;
        if (strlen($cnpj) == 00000000000000) return 0;
        $soma = 0;
        $soma += ($cnpj[0] * 5);
        $soma += ($cnpj[1] * 4);
        $soma += ($cnpj[2] * 3);
        $soma += ($cnpj[3] * 2);
        $soma += ($cnpj[4] * 9);
        $soma += ($cnpj[5] * 8);
        $soma += ($cnpj[6] * 7);
        $soma += ($cnpj[7] * 6);
        $soma += ($cnpj[8] * 5);
        $soma += ($cnpj[9] * 4);
        $soma += ($cnpj[10] * 3);
        $soma += ($cnpj[11] * 2);
        $d1 = $soma % 11;
        $d1 = $d1 < 2 ? 0 : 11 - $d1;
        $soma = 0;
        $soma += ($cnpj[0] * 6);
        $soma += ($cnpj[1] * 5);
        $soma += ($cnpj[2] * 4);
        $soma += ($cnpj[3] * 3);
        $soma += ($cnpj[4] * 2);
        $soma += ($cnpj[5] * 9);
        $soma += ($cnpj[6] * 8);
        $soma += ($cnpj[7] * 7);
        $soma += ($cnpj[8] * 6);
        $soma += ($cnpj[9] * 5);
        $soma += ($cnpj[10] * 4);
        $soma += ($cnpj[11] * 3);
        $soma += ($cnpj[12] * 2);
        $d2 = $soma % 11;
        $d2 = $d2 < 2 ? 0 : 11 - $d2;
        if ($cnpj[12] == $d1 && $cnpj[13] == $d2)
            return true;
        else
            return false;
    }
}
