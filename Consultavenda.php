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
                    <td>Nome do Funcionário</td>
                    <td>CPF do cliente</td>
                    <td>Marca do Veiculo</td>
                    <td>Cod do Veiculo</td>
                    <td>Data da Venda</td>
                    <td>Modo de Pagamento</td>
                    <td>Parcelas</td>
                    <td>Valor total</td>
                </tr>
            <?php
                try{
                    $conecta=new PDO("mysql: host=127.0.0.1 ; port=3306 ; dbname=concessionaria","root","");


                    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $dados=$conecta->query("SELECT * FROM venda");
                    
                    foreach ($dados as  $linha){?>
                        <tr>
                            <td><?php echo $linha['nomeFunc'];?></td>
                            <td><?php echo $linha['cpfCliente'];?></td>
                            <td><?php echo $linha['marca'];?></td>
                            <td><?php echo $linha['codVeiculo'];?></td>
                            <td><?php echo $linha['dataVenda'];?></td>
                            <td><?php echo $linha['modoPagamento'];?></td>
                            <td><?php echo $linha['qtdParcelas'];?></td>
                            <td><?php echo $linha['valorTotal'];?></td>
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
