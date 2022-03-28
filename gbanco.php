<?php
    session_start();
    if(!isset($_SESSION['idUser']))
    {
        header("location: index.php");
        exit;
    }
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Gerenciar</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/historicovendas.css">
    <link rel="shortcut icon" href="IMAGENS/buylogo.jpeg">
</head>

<body>


<header class="cabecalho">
<a href="#"><img src="IMAGENS/buylogo.jpeg" alt="BuyCar"></a>
        <h1> <a href="index.php" title="BuyCar">BuyCar - Vendas</a></h1>
        </form>
        <nav>
            <li><a href="index.php">HOME</a></li>
            <li><a href="caixa.php">CAIXA</a></li>
            <li><a href="cadVisita.php">AGENDAR VISITA</a></li>
            <li><a href="cadVeiculo.php">CADASTRAR VEICULO</a></li>
            <li><a href="cadCliente.php">CADASTRAR CLIENTES</a></li>
            <li><a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIOS</a></li>
            <li><a href="sair.php">SAIR</a></li> 
        </nav>
</header>


<section class="hero">


<?php
require("phplot.php");

    try{
        $g=new PHPlot(1720,800);
        $g->SetFileFormat("png");
        $g->SetTitle("Representacao grafica de veiculos no estoque");
        $g->SetPlotType("bars");
        $g->SetYTitle("Quantidade");
        $g->SetXTitle("Veiculos");
        
        $conectar=new PDO('mysql:host=localhost;port=3306;dbname=concessionaria', 'root', '');
        $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dados=$conectar->query("SELECT * FROM veiculos");

        // extrar os dados
        $matriz=array();
        foreach($dados as $linha){
            $matriz[]=array($linha['marca'],$linha['qtdEstoque']);
        }

        $g->SetDataValues($matriz);
        $g->SetIsInLine(true);
        $g->SetOutputFile("grafico_vendas.png");
        $g->DrawGraph();
        echo " ";


    }

    catch(PDOException $erro)
    {
        echo "Deu erro no banco";
    }

?>

<!--<form method="POST" action="grafico_vendas.png" target="_blank">

<input type="submit" value="GRÁFICO DE VEICULOS NO ESTOQUE"></input></form>-->


<form method="POST" action="consultaestoque.php" target="_blank">

<input type="submit" value="CONSULTAR ESTOQUE"></input></form>


<form method="POST" action="consultavenda.php" target="_blank">

<input type="submit" value="HISTÓRICO DE VENDAS"></input></form>


<form method="POST" action="consultavisita.php" target="_blank">

<input type="submit" value="VISITAS AGENDADAS"></input></form>


<form method="POST" action="consultafuncionario.php" target="_blank">

<input type="submit" value="FUNCIONARIOS"></input></form>


<form method="POST" action="consultacliente.php" target="_blank">

<input type="submit" value="CLIENTES"></input></form>


   
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





