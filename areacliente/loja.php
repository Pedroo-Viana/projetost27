<?php
include("../conectaDB.php");
$sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);
$ativo = 's';
if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $ativo = $_POST['ativo'];
    if($ativo == 's'){
        $sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
        $resultado = mysqli_query($link,$sql);
    }
    else{
        $sql = "SELECT * FROM produtos WHERE pro_ativo = 'n'";
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
    <title>LISTA PRODUTOS</title>
    <link rel="stylesheet" href="./newestilo.css">
</head>

<body>
<a href="login.php"><input type="button" id="menuhome" value="LOGIN"></a>
<a href="clientecadastra.php"><input type="button" id="menuhome" value="CADASTRA"></a>
    <form action="listaprodutos.php" method="post" class="lista">
    <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'? "checked":""?>>Ativar<br>
    <input type="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='n'? "checked":""?>>Desativa
    </form>
        <div class="container">            
            <table border="1">
                <tr>
                    <th>PRODUTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO (UNIDADE)</th> 
                    <th>STATUS</th>
                    <th>IMAGEM</th>    
                    <th>ADICIONAR CARRINHO  </th>                              
                <tr>
                    <?php
                    while ($tbl = mysqli_fetch_array($resultado)){
                        ?>
                        <tr>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>
                        <td><?= $tbl[4]?></td>  
                        <td><?= $check = ($tbl[5] == "s")?"SIM":"NÃO"?></td>                     
                        <td><img src="data:image/jpeg;base64,"<?=$tbl[6]?>></td>                                
                        <td><a href="alteraproduto.php?id=<?=$tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                                 
                        </tr>
                        <?php
                    }
                    ?>
            </table>
        </div>
</body>

</html>