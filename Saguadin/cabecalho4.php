<?php
include("conectadb3.php");
session_start();
isset($_SESSION['nomeusuario'])?$nomeusuario = $_SESSION['nomeusuario']: "";
$nomeusuario = $_SESSION['nomeusuario'];


?>

<div>

<ul class="menu">

            <li><a href="#">CADASTRA USUÁRIO</a></li>
            <li><a href="#">LISTAR USUARIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTOS</a></li>
            <li><a href="#">LISTA USUÁRIO</a></li>
            <li><a href="#">LISTA PRODUTO</a></li>
            <li><a href="#">LISTA CLIENTE</a></li>
            <li><a href="#">ENCOMENDAS</a></li>
            <li><a href="#">LOGIN COMPRA</a></li>
            <!--<li><a href="listaclientes.php">LISTAR CLIENTES</a></li>
            <li><a href="vendas.php">VENDAS</a></li>-->
            <li class="menuloja"><a href="logout.php">SAIR</a></li>

            <?php
                if($nomeusuario != null) {
                ?>
                    <li class="profile"> OLÁ  <?= strtoupper($nomeusuario) ?></li>
                    <?php
                } else {
                    ?>
                    <li class="profile"> OLÁ  <?= strtoupper($nomeusuario) ?></li>
                    <?php
                    echo "<script>window.alert('USUÁRIO NÃO AUTENTICADO'); window.location.href='login.php';</script>"; 
                }
                ?>
            
</ul>
</div>