<?php
#LOCALIZA PC COM BANCO
$servidor = "localhost";
#NOME DO BANCO
$banco = "projetosti27";
#USUARIO DE ACESSP
$usuario = "admin";
#SENHA DO USUARIO
$senha = "123";
#LINK DE ACESSO
$link = mysqli_connect($servidor,$usuario,$senha, $banco);