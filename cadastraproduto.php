<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){       
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $foto1 = $_POST ['foto1'];
    #VARIAVEIS BUSCANDO AS INFORMAÇÕES NO BANCO DE DADOS    
    Include ("conectaDB.php");  

        $sql = "SELECT COUNT(pro_id) FROM produto WHERE  pro_nome = '$nome'";
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
        $sql = "INSERT INTO produtos (pro_nome, pro_preco, pro_quantidade, pro_descricao, pro_ativo, imagem1) 
        VALUES ('$nome', '$preco', '$quantidade', '$descricao', 's', '$foto1')";
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
    <link rel="stylesheet" href="./newestilo.css">
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>        
        <form action="cadastraproduto.php" method="POST">
            <h1>CADASTRO DE PRODUTOS</h1>
            <input type="text" name="nome" id="nome" placeholder="Produto" required>
            <br><br>
            <input type="text" id="preco" name="preco" placeholder="Preço">
            <br><br>
            <input type="text" id="quantidade" name="quantidade" placeholder="Quantidade">
            <br><br>
            <input type="text" id="descricao" name="descricao" placeholder="Descricao"> <br><br> 
            <label for="">IMAGEM</label>
            <input type="file" name="foto1" id="img1" onchange="foto1()">
            <br>
            <img src="img/semimg.png" width="50px" id="foto1a">  

            <br><br>
            <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
            <!-- #USADO PARA INSERIR AS INFORMAÇÕES -->
        </form>
        <script>
            function foto1(){
            document.getElementById("foto1a").src = "img/" (document.getElementById("img1").value).slice(12);
            }
        </script>
    </div>    
</body>
</html>