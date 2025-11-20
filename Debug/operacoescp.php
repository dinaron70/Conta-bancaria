<?php

require __DIR__ . '/../vendor/autoload.php';

use App\ContasTipo\ContaPoupanca;
use App\Contratos\DadosContaBancariaInterface;
use App\Contratos\OperacoesContaBancariaInterface;

function executarOperacoes(OperacoesContaBancariaInterface $conta): void
{
    echo $conta->obterSaldo();
    echo PHP_EOL;

    echo $conta->efuar_deposito(50);
    echo PHP_EOL;
    
    echo $conta->obterSaldo();
    echo PHP_EOL;
    
    echo $conta->efetuarsaque(30);
    echo PHP_EOL;
    
    echo $conta->obterSaldo();
    echo PHP_EOL;
}

function exibirDados(DadosContaBancariaInterface $conta): void
{    
    echo "Banco: " . $conta->getBanco();
    echo PHP_EOL;
    
    echo "Ag./Conta: " . $conta->getNumeroAgencia() . "/" . $conta->getNumeroConta();
    echo PHP_EOL;

    echo "Titular: " . $conta->getNomeTitular();
    echo PHP_EOL;

    echo "--------------------------------------------";
    echo PHP_EOL;
}

$conta = new ContaPoupanca(
    'Banco Sencangyn', // banco - pode trocar o nome do banco
    'Dinaron Dias', // nomeTitular - pode trocar o nome do titular
    '8024', // numeroAgencia - pode trocar o numero da agência
    '57399-11', // numeroConta - pode trocar o numero da conta
    0 // saldo
);

exibirDados($conta);
executarOperacoes($conta);