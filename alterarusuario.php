<?php

use function PHPSTORM_META\map;

include('conectaDB.php');
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sql = "UPDATE usuarios SET usu_senha = '$senha', usu_nome = '$nome' WHERE usu_id = id";
    mysqli_query($link, $sql);
    header("Location: listausuario.php");
    echo "<scripit>alert('USUARIO ALTERADO COM SUCESSO!');</script>";
    exit();
}

#CAPTURAR ID VIA GET
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usu_id = $id";
$resultado = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($resultado)) {
    $nome = $tbl[1];
    $senha = $tbl[2];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuario</title>
</head>

<body>
    <div>
        <form action="alterarusuario.php" method="post">
            <input type="hidden" value="<?=$id?>" name="id">;
            <label>Nome</label>;
            <input type="text" name="nome" id="nome" value="<?=$nome?>">;
            <label>SENHA</label>;
            <input type="password" name="senha" value="<?=$senha?>"
            <br>
            <input type="submit" value="SALVAR">;
        </form>
            
    </div>
</body>

</html>