<?php
include("conectaDB.php");
if ($_SERVER['RESQUEST_METHOD'] == 'POST') {
}
$id = $_POST['id'];
$sql = "DELETE FROM usuarios WHERE usu_id = '$id'";
mysqli_query($link, $sql);
header("Location: listausuario.php");
exit();

if (isset($_GET['id'])) {
    header("Location: listausuario.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT use_nome FROM usuarios WHERE usu_id = '$id'";
$resultado = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXLCUIR USUARIO</title>
</head>

<body>
    <div>
        <h1>EXLCUIR USUARIO</h1>
        <p>GOSTARIA DE EXLCUIR O USUARIO</b><?= $nome?></b>
        <form action="excluirusuario.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="SIM">
        </form>
        <a href="listausuario.php"><button id="botao">NÃO</button></a>
    </div>
</body>

</html>