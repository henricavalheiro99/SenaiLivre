<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "senailivre";
    $dsn = "mysql:host=$host;dbname=$banco";

    try{
        $conexao = new PDO($dsn, $usuario, $senha);
    }catch(\PODException $e){
        var_dump($e->getMessage());
        // criar um arquivo jason, um erro com uma chave
    }
    // se não executar no try vem pro catch que é uma exceção