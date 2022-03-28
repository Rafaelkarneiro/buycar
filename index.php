<?php
    require_once 'CLASSES/usuario.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="shortcut icon" href="IMAGENS/buylogo.jpeg">
</head>

<body>


<header class="cabecalho">
<a href="#"><img src="IMAGENS/buylogo.jpeg" alt="BuyCar"></a>
        <h1> <a href="index.php" title="BuyCar">BuyCar - Vendas</a></h1>
        </form>
        <nav>
            <li><a href="index.php">home</a></li>
            <li><a href="sobrebuy.php">SOBRE</a></li>
            <li><a href="faleconosco.php">FALE CONOSCO</a></li>      
        </nav>
</header>


<section class="hero">

    <div id="corpo-form">
    
        <form class="box" method="POST">
        <h1>Faça o seu login</h1>
        <input type="text" name="nomeUsuario" placeholder="Nome de Usuário" maxlength="15">
        <input type="password" name="senha" placeholder="Senha" maxlength="25">
        <input type="submit" value="ENTRAR">
        <!--<a href="cadastrar.php">Ainda não é inscrito?<strong> Cadastre-se</strong></a>-->

<?php
    if(isset($_POST['nomeUsuario']))
    {
        $nome = addslashes($_POST['nomeUsuario']);
        $senha = addslashes($_POST['senha']);


        if(!empty($nome) && !empty($senha))
        {
            $u->conectar("concessionaria","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($nome,$senha))
                {
                    header("location: areaPrivada.php");
                }
                else
                {
                    ?>
                    <div class ="msg-erro"> 
                    Email e/ou senha estão incorretos!         
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