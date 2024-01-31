<?php
    include("cabecalho4.php");
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $custo = $_POST['custo'];
        $preco = $_POST['preco'];
        $quant = $_POST['quant'];
        $val = $_POST['val'];
        $for_id = $_POST['fornecedor'];
 
        $sql = "SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
        $retorno = mysqli_query($link, $sql);
        $cont = (mysqli_fetch_array($retorno)[0]);
 
        if ($cont == 0) {
            $sql = "INSERT INTO produtos(pro_nome, pro_desc, pro_custo, pro_preco, pro_quant, pro_val, pro_status, fk_for_id)
            VALUES('$nome', '$desc', '$custo', $preco, $quant, '$val', 's', $for_id)";
           
            mysqli_query($link, $sql);
            echo"<script>window.alert('PRODUTO CADASTRADO COM SUCESSO');</script>";
            echo"<script>window.location.href='cadastraproduto.php';</script>";
        }
        else {
            echo"<script>window.alert('PRODUTO JÁ EXISTENTE');</script>";
        }
    }
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./cli6.css">
    <title>Cadastra Produto</title>
</head>
<body> <br><br><br><br><br>
    <div id="container">    
        <form action="cadastraproduto.php" method="post">
            <h3 align="center">CADASTRO DE PRODUTOS</h3>
            <label>Nome Produto</label>
            <input type="text" name="nome" id="nome">
            <label>Descrição</label>
            <input type="text" name="desc" id="desc"></input>
            <label>Custo</label>
            <input type="number" step="0.01" name="custo" id="custo">
            <label>Preço</label>
            <input type="decimal" name="preco" id="preco">
            <label>Quantidade</label>
            <input type="number" step="0.01" name="quant" id="quant">
            <label>Validade</label>
            <input type="date" name="val" id="val">
           
            <select name="fornecedor" id="fornecedor" required>
               
            <br><br><br><br>
                <?php
 
                $sql = "SELECT for_id, for_nome FROM fornecedor";
                $retorno = mysqli_query($link, $sql);
 
                while($tbl = mysqli_fetch_array($retorno)) {
                    ?>
                    <option value="<?=$tbl[0]?>"><?=$tbl[1]?></option>
                    <?php
                }
                ?>
            </select><br>
            <input type="submit" name="cadastrar" value="CADASTRAR">
        </form>
    </div>
</body>
</html>