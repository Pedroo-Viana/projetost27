<?php
include("conectaDB.php");
$sql = "SELECT * FROM usuarios WHERE usu_ativo = 's'";
$resultado = mysqli_query($link, $sql);
$ativo = 's';

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $ativo = $_POST['ativo'];
    if($ativo == 's'){
        $sql = "SELECT * FROM usuarios WHERE usu_ativo = 's'";
        $resultado = mysqli_query($link,$sql);
    }
    else{
        $sql = "SELECT * FROM usuarios WHERE usu_ativo = 'n'";
        $resultado = mysqli_query($link,$sql);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <form action="listausuario.php" method="post">
    <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'? "checked":""?>>Ativar<br>
    <input type="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='n'? "checked":""?>>Desativa
    </form>
    
        <div class="container">
            <table border="1">
                <tr>
                    <th>HOME</th>
                    <th>ALTERAR</th>
                    <th>EXCLUIR</th>

                <tr>
                    <?php
                    while ($tbl = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                        <td><?= $tbl[1]?></td>
                        <td><a href="alterarusuario.php?id=<?=$tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <!-- <td><a href="excluirusuario.php?id=<//?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td> -->
                        <td><?= $check = ($tbl[3] == "s")?"SIM":"NÃO"?></td>
                        </tr>   
                        <?php
                    }
                    ?>
            </table>
        </div>
</body>

</html>