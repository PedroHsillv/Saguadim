<?php 
include("cabecalho4.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];

    $sql = "SELECT COUNT(for_id) FROM fornecedor WHERE for_nome = '$nome'";
    $retorno = mysqli_query($link,$sql);

    $retorno = mysqli_fetch_array($retorno) [0];
    if($retorno == 0){
        $sql = "INSERT INTO fornecedor (for_nome) VALUES('$nome')";
        mysqli_query($link,$sql);
        echo"<script>window.alert('FORNECEDOR CADASTRADO COM SUCESSO');
        window.location.href='backoffice.php';</script>";
    }
    else{
        echo"<script>window.alert('FORNECEDOR JA CADASTRADO');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cli6.css">
    <title>Fornecedor</title>
</head>
<body>
    <br><br><br><br><br><br>
    <div id="container">
        <form action="fornecedor.php" method="post">
            <input type="text" name="nome" placeholder="NOME FORNECEDOR">
            <input type="submit" name="cadastrar" value="CADASTRAR">
        </form>
    </div>
</body>
</html>