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
    <title>Caixa</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/caixa.css">
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
            <li><a href="cadVisita.php">AGENDAR VISITA</a></li>   
            <li><a href="cadVeiculo.php">CADASTRAR VEÍCULOS</a></li>
            <li><a href="cadCliente.php">CADASTRAR CLIENTES</a></li>
            <li><a href="cadFuncionario.php">CADASTRAR FUNCIONÁRIOS</a></li>
            <li><a href="gbanco.php">GERENCIAR</a></li>
            <li><a href="sair.php">SAIR</a></li> 
            <!--<li><a href="">CADASTRAR CONCESSIONARIA</a></li>-->
               
        </nav>
</header>

<section class="hero">

    <div id="corpo-form">
        
        <form class="box" method="POST">
        <h1>CAIXA</h1>

        <input type="text" name="nomeFunc" placeholder="Vendedor" maxlength="50">
        <input type="text" name="cpf" placeholder="CPF do Cliente" maxlength="11"> 
        <input type="text" name="marca" placeholder="Marca do veículo" maxlength="40">
        <input type="text" name="codVeiculo" placeholder="Código do Veículo" maxlength="40">
        <input type="date" name="data">
        
        <select name="pagamento" placeholder="Método de Pagamento"> <!--Select e optgroup para criar um grupo de informações-->

            <optgroup label="Métodos de Pagamento"><br>
                <option value="cartao"> Cartão de Crédito</option>
                <option value="financiamento"> Financiamento </option>
                <option value="transferencia"> Transferência bancária</option>
            </optgroup>

        </select>
        <input type="number" name="qtdParcelas" placeholder="Número de Parcelas" min="1" max="6">
        <input type="text" name="valorTotal" placeholder="Valor Total da Venda" maxlength="15">
        <input type="submit" value="FIZALIZAR VENDA">   
        <!--<input placeholder="Método de pagamento"name="pagamento"list="metodo-pagamento" type="list">

        <datalist id="metodo-pagamento">
            <option value="Cartão de crédito">
            <option value="Financiamento">
        </datalist>

        <br><br>
        <input type="submit" value="FIZALIZAR VENDA">
        <a href="index.php">Ja é inscrito no site?<strong> Entrar</strong></a>-->
        <?php
    //verificar se clicou no botão
    if(isset($_POST['nomeFunc']))
    {
        $nomeFunc = addslashes($_POST['nomeFunc']); // "addslashes()" serve para bloquear a possibilidade de hakers inserirem comandos nas caixas de preenchimento.
        $cpf = addslashes($_POST['cpf']);
        $marca = addslashes($_POST['marca']);
        $codVeiculo = addslashes($_POST['codVeiculo']);
        $dataVenda = addslashes($_POST['data']);
        $modoPag = addslashes($_POST['pagamento']);
        $qtdParcelas = addslashes($_POST['qtdParcelas']);
        $valorTotal = addslashes($_POST['valorTotal']);

        if(!empty($nomeFunc) && !empty($cpf) && !empty($marca) && !empty($codVeiculo) && !empty($dataVenda) && !empty($modoPag) && !empty($qtdParcelas) && !empty($valorTotal)) 
        {
            $u->conectar("concessionaria","localhost","root","");
            if($u->msgErro == "")//se esta tudo ok
            {
                if($u->cadVendas($nomeFunc, $cpf, $marca, $codVeiculo, $dataVenda, $modoPag, $qtdParcelas, $valorTotal));
                {
                ?>
                    <div id ="msg-sucesso"> 
              
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
        
    <p> Todos os direitos reservados 2020 - ©ByCar - Vendas, Inc</p>  

</footer>

</body>
</html>