<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Consultar Vendas</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/consulta.css">
    <link rel="shortcut icon" href="IMAGENS/buylogo.jpeg">
</head>

<body>


<header class="cabecalho">
<a href="#"><img src="IMAGENS/buylogo.jpeg" alt="BuyCar"></a>
        <h1> <a href="index.php" title="BuyCar">BuyCar - Vendas</a></h1>
        </form>
        <nav>
        <li><a href="areaPrivada.php">HOME</a></li>
            <li><a href="caixa.php">CAIXA</a></li>
            <li><a href="cadVisita.php">AGENDAR VISITA</a></li>
            <li><a href="cadVeiculo.php">CADASTRAR VEICULO</a></li>
            <li><a href="cadCliente.php">CADASTRAR CLIENTES</a></li>
            <li><a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIOS</a></li>
            <li><a href="gbanco.php">GERENCIAR</a></li>
            <li><a href="sair.php">SAIR</a></li>   
        </nav>
</header>


    <section>
    
        <form class="consulta">

            <table>
                <tr>
                    <td>Nome do Cliente</td>
                    <td>CPF do cliente</td>
                    <td>Email</td>
                    <td>Cel </td>
                    <td>Tel</td>
                    </tr>
            <?php
                try{
                    $conecta=new PDO("mysql: host=127.0.0.1 ; port=3306 ; dbname=concessionaria","root","");


                    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $dados=$conecta->query("SELECT * FROM clientes");
                    
                    foreach ($dados as  $linha){?>
                        <tr>
                            <td><?php echo $linha['nome'];?></td>
                            <td><?php echo $linha['cpf'];?></td>
                            <td><?php echo $linha['email'];?></td>
                            <td><?php echo $linha['cel'];?></td>
                            <td><?php echo $linha['tel'];?></td>
                          </tr>
                    <?php } 
                }


                catch(PDOException $erro){
                    echo"`Problema de conexão...";
                }


            ?>
        </form>
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
