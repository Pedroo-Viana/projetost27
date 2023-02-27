<?php 
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $nome = $_POST ['nome'];
    $preco = $_POST ['preco'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST ['descricao'];
    #VARIAVEIS BUSCANDO AS INFORMAÇÕES NO BANCO DE DADOS    
    Include ("conectaDB.php");
    #VERIFICA SE O PRODUTO JÁ ESTA CADASTRADO
    $sql = "SELECT COUNT(pro_nome) FROM produtos WHERE pro_nome= '$nome' AND pro_preco='$preco'";
    $resultado = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($resultado)){        
        $cont =$tbl[0];
    }
    if($cont == 1){
        echo"<script>window.alert('PRODUTO JA CADASTRADO');</script>";
    }
    #EXIBE ISSO QUANDO O NOME DO PRODUTO JÁ EXISTE
    else{
        $sql = "INSERT INTO produtos (pro_nome, pro_preco, pro_quantidade, pro_descricao, pro_ativo) 
        VALUES ('$nome', '$preco', '$quantidade', '$descricao', 's')";
        mysqli_query($link,$sql);
        header("Location: listaprodutos.php");
    }
    #INSERE O PRODUTO NA TABELA E NO BANCO DE DADOS SQL
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE PRODUTOS</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
    <a href="homesistema.php"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>        
        <form action="cadastraproduto.php" method="POST">
            <h1>CADASTRO DE PRODUTOS</h1>
            <input type="text" name="nome" id="nome" placeholder="Produto" required>
            <br><br>
            <input type="text" id="preco" name="preco" placeholder="Preço">
            <br><br>
            <input type="text" id="quantidade" name="quantidade" placeholder="Quantidade">
            <br><br>
            <input type="text" id="descricao" name="descricao" placeholder="Descricao">          
            <br><br>
            <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
            #USADO PARA INSERIR AS INFORMAÇÕES
        </form>
    </div>    
</body>
</html>