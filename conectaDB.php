<?php
#LOCALIZA PC COM BANCO
$servirdor = "localhost";
#NOME DO BANCO
$banco = "projeto27";
#USUARIO DE ACESSP
$usuario = "admin";
#SENHA DO USUARIO
$senha = "123";
#LINK DE ACESSO
$link = mysqli_connect($servirdor, $banco, $usuario, $senha);