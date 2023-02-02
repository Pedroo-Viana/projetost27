<?php 
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $nome = $_POST ['nome'];
    $senha = $_POST ['senha'];
    Include ("conectaDB.php");

    #VERIFICA USUARIO EXISTE
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome= '$nome' AND usu_senha= '$senha'";
    $resultado = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont =$tbl[0];
    }
    if($cont == 1){
        echo"<script>window.alert('USUARIO JA CADASTRADO');</script>";
    }
    else{
        $sql = "INSERT INTO usuarios (usu_nome, usu_senha) VALUES('$nome', '$senha')";
        mysqli_query($link,$sql);
        header("Location: listausuario.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE USUARIOS</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
    <a href="homesistema.php"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>
        <!-- script para mostrar senha -->
        <script>
            function mostrarsenha() {
                var tipo = document.getElementById("senha");
                if (tipo.type == "password"){
                    tipo.type = "text";
            } 
            else{
                tipo.type = "password";
            }
            
        }
        </script>
        <!-- FIM DO SCRIPT PARA MOSTARAR A SENHA -->

        <form action="cadastrausuario.php" method="POST">
            <h1>CADASTRO DE USUARIO</h1>
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <br>
            <input type="password" id="senha" name="senha" placeholder="Senha">
            <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
            <br>   <br>
            <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
        </form>
    </div>
    
</body>
</html>