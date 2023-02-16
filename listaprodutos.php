<?php
include("conectaDB.php");
$sql = "SELECT * FROM produtos";
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
            <table border="1">
                <tr>
                    <th>PRODUTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO (UNIDADE)</th>                                   
                <tr>
                    <?php
                    while ($tbl = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>
                        <td><?= $tbl[4]?></td>                        
                        </tr>   
                        <?php
                    }
                    ?>
            </table>
        </div>
</body>

</html>