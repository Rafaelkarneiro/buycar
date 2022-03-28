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
    <title>Cadastro de cliente</title>
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
            <li><a href="cadVisita.php">AGENDAR VISITA</a></li>
            <li><a href="cadVeiculo.php">CADASTRAR VEICULO</a></li>
            <li><a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIOS</a></li>
            <li><a href="gbanco.php">GERENCIAR</a></li>
            <li><a href="sair.php">SAIR</a></li>          
        </nav>
</header>

<section class="hero">

    <div id="corpo-form">
        
        <form class="box" method="POST">
        <h1>Cadastrar Cliente</h1>

        <input type="text" name="cpf" placeholder="CPF" maxlength="11">
        <input type="text" name="nome" placeholder="Nome" maxlength="50">
        <input type="email" name="email" placeholder="E-mail" maxlength="50">
        <input type="text" name="tel" placeholder="Telefone" maxlength="20">
        <input type="text" name="cel" placeholder="Celular" maxlength="20">
        <input type="submit" value="CADASTRAR">
        <!--<a href="index.php">Ja é inscrito no site?<strong> Entrar</strong></a>-->
   
        <?php
    //verificar se clicou no botão
    if(isset($_POST['cpf']))
    {
        $cpf = addslashes($_POST['cpf']); // "addslashes()" serve para bloquear a possibilidade de hakers inserirem comandos nas caixas de preenchimento.
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $cel = addslashes($_POST['cel']);
        $tel = addslashes($_POST['tel']);

        if(!empty($cpf) && !empty($nome) && !empty($email) && !empty($cel) && !empty($tel))
        {
            $u->conectar("concessionaria","localhost","root","");
            if($u->msgErro == "")//se esta tudo ok
            {
                if($u->cadCliente($cpf, $nome, $email, $cel, $tel))
                {
                    ?>
                    <div id ="msg-sucesso"> 
                    Cliente cadastrado com sucesso!
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class ="msg-erro"> 
                    Cliente ja cadastrado!
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