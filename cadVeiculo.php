<?php
//  require_once 'CLASSES/usuario.php';
//  $u = new Usuario;
    session_start();
    if(!isset($_SESSION['idUser']))
    {
        header("location: index.php");
        exit;
    }
    else{
        require_once 'CLASSES/usuario.php';
        $u = new Usuario;
    }
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastro de Veículo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="shortcut icon" href="IMAGENS/buylogo.jpeg">
</head>

<body>

<header class="cabecalho">

        <a href="#"><img src="IMAGENS/buylogo.jpeg" alt="BuyCar"></a>
        
        <h1>
            <a href="index.php" title="BuyCar">BuyCar - Vendas</a>
        </h1>

        
        <nav>
            <li><a href="areaPrivada.php">HOME</a></li>
            <li><a href="caixa.php">CAIXA</a></li>     
            <li><a href="cadVisita.php">AGENDAR VISITAS</a></li>
            <li><a href="cadCliente.php">CADASTRAR CLIENTES</a></li>
            <li><a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIOS</a></li>
            <li><a href="gbanco.php">GERENCIAR</a></li>
            <li><a href="sair.php">SAIR</a></li> 

               
        </nav>
</header>

<section class="hero">

    <div id="corpo-form">
        
        <form class="box" method="POST">
        <h1>Cadastrar Veículo</h1>

        <input type="text" name="cod" placeholder="Código do veículo" maxlength="5">
        <input type="text" name="marca" placeholder="Marca" maxlength="40">
        <input type="text" name="modelo" placeholder="Modelo" maxlength="40">
        <input type="text" name="cor" placeholder="Cor" maxlength="40">
        <input type="number" name="qtd" placeholder="Quantidade em estoque" min="1" max="100">
        <input type="text" name="preco" placeholder="Preço" maxlength="40">
        <input type="submit" value="CADASTRAR">
        <!--<a href="index.php">Ja é inscrito no site?<strong> Entrar</strong></a>-->
    
        <?php
    //verificar se clicou no botão
    if(isset($_POST['cod']))
    {
        $codVeiculo = addslashes($_POST['cod']); // "addslashes()" serve para bloquear a possibilidade de hakers inserirem comandos nas caixas de preenchimento.
        $marca = addslashes($_POST['marca']);
        $modelo = addslashes($_POST['modelo']);
        $cor = addslashes($_POST['cor']);
        $qtdEstoque = addslashes($_POST['qtd']);
        $preco = addslashes($_POST['preco']);

        if(!empty($codVeiculo) && !empty($marca) && !empty($modelo) && !empty($cor) && !empty($qtdEstoque) && !empty($preco))
        {
            $u->conectar("concessionaria","localhost","root","");
            if($u->msgErro == "")//se esta tudo ok
            {
                if($u->cadVeiculos($codVeiculo, $marca, $modelo, $cor, $qtdEstoque, $preco))
                {
                    ?>
                    <div id ="msg-sucesso"> 
                    Veículo cadastrado com sucesso!
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class ="msg-erro"> 
                    Veículo ja cadastrado!
                    </div>
                    <?php                    
                }
            }
            else
            {
                ?>
                <div class ="msg-erro"> 
                <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class ="msg-erro"> 
            Preencha todos os campos!          
            </div>
            <?php 
        }
    }
?>
        </form>
    </div>
</section>

<footer>

    <ul>    
        <li><a href=""><i class="fab fa-facebook"></i></a></li>
        <li><a href=""><i class="fab fa-twitter"></i></a></li>
        <li><a href=""><i class="fab fa-youtube"></i></a></li>
        <li><a href=""><i class="fas fa-envelope"></i></a></li>
    </ul>
        
    <p> Todos os direitos reservados 2020 - ©BuyCar - Vendas, Inc</p>  

</footer>

</body>
</html>