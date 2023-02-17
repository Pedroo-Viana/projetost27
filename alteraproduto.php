<?php
include("conectaDB.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$ativo = $_POST['ativo'];

$sql = "UPDATE produtos SET pro_nome = '$nome', pro_descricao = '$descricao', pro_preco = '$preco', pro_ativo = '$ativo'";
mysqli_query($link, $sql);

header("Location: listaproduto.php");
echo"<script>windown.alert('Produto ALTERADO!');</script>";
exit();
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE pro_id = '$id'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[1];
    $ativo = $tbl[5];
    $descricao = $tbl[1];
    $preco = $tbl[3];
    $nome = $tbl[1];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTERA PRODUTO</title>
</head>
<body>
    <div>
        <form action="alteraproduto.php" method="post">
            <input type="hidden" name="id" value="<?=$id;?>">
            <label>NOME</label>
            <input type="hidden" name="id" value="<?=$id;?>">
            <label>DESCRIÇÃO</label>
            <input type="hidden" name="id" value="<?=$id;?>">
            <label>QUANTIDADE</label>
            <input type="hidden" name="id" value="<?=$id;?>">
            <label>PREÇO</label>
            <input type="hidden" name="id" value="<?=$id;?>">
            <br><br>
            <label>Status: <?= $check = ($ativo == 's') ? "ATIVO" : "INATIVO"; ?><br></label><br>

            <input type="radio" name="ativo" value="s">ATIVAR <br>
            
            <input type="radio" name="ativo" value="n">DESATIVAR 

            <br>
            <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>