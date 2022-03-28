<?php 

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;

        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario, $senha);
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
        
    }
    //CADASTRO DE FUNCIONÁRIOS
    public function cadFunc($nomeUsuario, $nomeFunc, $cargo, $senha)
    {
        global $pdo;
        //verificando se o email ja existe no BD
        $sql = $pdo->prepare("SELECT idUsuario FROM funcionarios WHERE nomeUsuario = :nU");
        $sql->bindValue(":nU", $nomeUsuario);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //Ja esta cadastrado.
        }
        else
        {
            //caso não esteja cadastrado, Cadastrar:
            $sql = $pdo->prepare("INSERT INTO funcionarios (nomeUsuario, nome, cargo, senha) VALUES (:nU, :n, :c, :s)");
            $sql->bindValue(":nU",$nomeUsuario);
            $sql->bindValue(":n",$nomeFunc);
            $sql->bindValue(":c",$cargo);
            $sql->bindValue(":s",$senha); 
            $sql->execute();
            return true;

        }
    }

    //CADASTRO DE CLIENTES
    public function cadCliente($cpf, $nome, $email, $cel, $tel)
    {
        global $pdo;
        //verificando se o email ja existe no BD
        $sql = $pdo->prepare("SELECT nome FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //Ja esta cadastrado.
        }
        else
        {
            //caso não esteja cadastrado, Cadastrar:
            $sql = $pdo->prepare("INSERT INTO clientes (cpf, nome, email, cel, tel) VALUES (:cpf, :nom, :ema, :cel, :tel)");
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":nom",$nome);
            $sql->bindValue(":ema",$email);
            $sql->bindValue(":cel",$cel); 
            $sql->bindValue(":tel",$tel);
            $sql->execute();
            return true;
        }
    }
    
    //CADASTRO DE VEICULOS
    public function cadVeiculos($codVeiculo, $marca, $modelo, $cor, $qtdEstoque, $preco)
    {
        global $pdo;
        //verificando se o email ja existe no BD
        $sql = $pdo->prepare("SELECT codVeiculo FROM veiculos WHERE modelo = :mod");
        $sql->bindValue(":mod", $modelo);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //Ja esta cadastrado.
        }
        else
        {
            //caso não esteja cadastrado, Cadastrar:
            $sql = $pdo->prepare("INSERT INTO veiculos (codVeiculo, marca, modelo, cor, qtdEstoque, preco) VALUES (:cod, :mar, :mod, :cor, :qtd, :pre)");
            $sql->bindValue(":cod",$codVeiculo);
            $sql->bindValue(":mar",$marca);
            $sql->bindValue(":mod",$modelo);
            $sql->bindValue(":cor",$cor); 
            $sql->bindValue(":qtd",$qtdEstoque);
            $sql->bindValue(":pre",$preco);
            $sql->execute();
            return true;

        }
    }

    //CADASTRO DE VISITAS
    public function cadVisitas($nomeCliente, $nomeFunc, $dataVisita, $horaVisita)
    {
        global $pdo;

            $sql = $pdo->prepare("INSERT INTO visita (nomeCliente, nomeFunc, dataVisita, horaVisita) VALUES (:nC, :nF, :dV, :hV)");
            $sql->bindValue(":nC",$nomeCliente);
            $sql->bindValue(":nF",$nomeFunc);
            $sql->bindValue(":dV",$dataVisita);
            $sql->bindValue(":hV",$horaVisita); 
            $sql->execute();
    }

    //CADASTRO DE VENDAS
    public function cadVendas($nomeFunc, $cpf, $marca, $codVeiculo, $dataVenda, $modoPag, $qtdParcelas, $valorTotal)
    {
        global $pdo;

            $sql = $pdo->prepare("INSERT INTO venda (nomeFunc, cpfCliente, marca, codVeiculo, dataVenda, modoPagamento, qtdParcelas, valorTotal) VALUES (:nF, :cpf, :mar, :cod, :dat, :mod, :qtd, :vT)");
            $sql->bindValue(":nF",$nomeFunc);
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":mar",$marca);
            $sql->bindValue(":cod",$codVeiculo); 
            $sql->bindValue(":dat",$dataVenda);
            $sql->bindValue(":mod",$modoPag);
            $sql->bindValue(":qtd",$qtdParcelas);
            $sql->bindValue(":vT",$valorTotal);
            $sql->execute();
    }

    public function logar($nomeUsuario,$senha)
    {
        global $pdo;
        
        $sql = $pdo->prepare("SELECT idUsuario FROM funcionarios Where nomeUsuario = :nU AND senha = :s");
        $sql->bindValue(":nU",$nomeUsuario);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        //verificar se o email e a senha estão cadastrados, se sim:
        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['idUser'] = $dado['idUsuario'];
            return true; //cadastrado com sucesso
        }
        else
        {
            return false; //não foi possivel logar
        }
    }
}
?>