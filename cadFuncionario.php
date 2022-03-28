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
    <title>Cadastro de Funcionário</title>
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
            <li><a href="cadCliente.php">CADASTRAR CLIENTES</a></li>
            <li><a href="gbanco.php">GERENCIAR</a></li>
            <li><a href="sair.php">SAIR</a></li> 
               
        </nav>
</header>

<section class="hero">

    <div id="corpo-form">
        
        <form class="box" method="POST">
        <h1>Cadastrar Funcionário</h1>

        <input type="text" name="nomeUsuario" placeholder="Nome de Usuário" maxlength="15">
        <input type="text" name="nomeFunc" placeholder="Nome do Funcionário" maxlength="50">
        <input type="text" name="cargo" placeholder="Cargo" maxlength="25">
        <input type="password" name="senha" placeholder="Crie uma Senha" maxlength="25">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="25">
        <input type="submit" value="CADASTRAR">
        <!--<a href="index.php">Ja é inscrito no site?<strong> Entrar</strong></a>-->
    
<?php
    //verificar se clicou no botão
    if(isset($_POST['nomeUsuario']))
    {
        $nomeUsuario = addslashes($_POST['nomeUsuario']); // "addslashes()" serve para bloquear a possibilidade de hakers inserirem comandos nas caixas de preenchimento.
        $nomeFunc = addslashes($_POST['nomeFunc']);
        $cargo = addslashes($_POST['cargo']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        if(!empty($nomeUsuario) && !empty($nomeFunc) && !empty($cargo) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("concessionaria","localhost","root","");
            if($u->msgErro == "")//se esta tudo ok
            {
                if($senha == $confirmarSenha) 
                {
                    if($u->cadFunc($nomeUsuario,$nomeFunc,$cargo,$senha))
                    {
                        ?>
                        <div id ="msg-sucesso"> 
                        Funcionário cadastrado com sucesso!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class ="msg-erro"> 
                        Funcionário ja cadastrado!
                        </div>
                        <?php                    
                    }
                }
                else
                {
                    ?>
                    <div class ="msg-erro"> 
                    Senha e Confirmar senha não correspondem!
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