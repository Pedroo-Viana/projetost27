<?php
include("conectaDB.php");
$sql = "SELECT * FROM usuarios WHERE usu_ativo = 's'";
$resultado = mysqli_query($link, $sql);
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
        <div class="container">
            <input type="radio" name="listadesativados" value="n"><?$checar = ($tbl[3] == "n")? "checked":""?>LISTA DESATIVADOS<br>
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