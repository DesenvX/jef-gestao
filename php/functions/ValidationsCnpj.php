<?php

namespace functions;

class ValidationsCpfCnpj
{
    public function VerificaCpfCnpj($cpf_or_cnpj)
  {
    if (strlen($cpf_or_cnpj) == 11) {
      // Verifica se é um CPF
      return "CPF";
    } elseif (strlen($cpf_or_cnpj) == 14) {
      // Verifica se é um CNPJ
      return "CNPJ";
    } else {
      return "Não é CPF nem CNPJ";
    }
  }
}