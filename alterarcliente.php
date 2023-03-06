<?php
include("conectaDB.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$tel = $_POST['telefone'];
$nome = $_POST['nome'];
$logadouro = $_POST['logadouro'];
$cidade = $_POST['cidade'];
$cpf = $_POST['cpf'];
$nasc = $_POST['nascimento'];
$num = $_POST ['numero'];
$ativo = $_POST['ativo'];
$senha = $_POST['senha0'];

$sql = "UPDATE clientes SET cli_telefone = '$tel', cli_nome = '$nome', cli_numero ='$num', cli_nascimento ='$nasc', cli_logadouro = '$logadouro', cli_ativo = '$ativo' cli_cidade ='$cidade', cli_cpf = '$cpf' WHERE cli_id = $id";

mysqli_query($link, $sql);

header("Location: listaprodutos.php");
echo"<script>windown.alert('Produto ALTERADO!');</script>";
exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE pro_id = '$id'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[2];
    $ativo = $tbl[8];
    $cpf = $tbl[1];
    $nasc = $tbl[3];
    $tel = $tbl[4];    
    $logadouro = $tbl[5];
    $num = $tbl[6];
    $cidade = $tbl[8];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuario</title>
    <link rel="stylesheet" href="./newestilo.css">
</head>

<body>
<a href="homesistema.php"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>
        <form action="alterarusuario.php" method="post">
            <input type="hidden" value="<?= $id ?>" name="id"> 
            <label>NOME</label>
            <input type="text" name="nome" value="<?= $nome?>" required>
            <label>SENHA</label>
            <input type="password" name="senha" value="<?=$senha?>" required>
            <label for="">TELEFONE</label>
            <input type="text" name="telefone" value="<?=$$tel?>" required>
            <label>LOGADOURO</label>
            <input type="text" name="logadouro" value="<?=$$logadouro?>" required>
            <label>CPF</label>
            <input type="text" name="CPF" value="<?=$cpf?>" required>
            <br>

            <input type="radio" name="ativo" value="s">ATIVAR <br>            
            <input type="radio" name="ativo" value="n">DESATIVAR 
            <br>
            <input type="submit" value="SALVAR">
        </form>

    </div>
</body>

</html>