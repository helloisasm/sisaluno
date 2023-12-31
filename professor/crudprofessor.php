<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET

        $nome = strtoupper($_GET["nome"]);
        $cpf =  filter_var($_GET["cpf"], FILTER_SANITIZE_NUMBER_INT);
        $idade = filter_var($_GET["idade"], FILTER_SANITIZE_NUMBER_INT);
        $datanascimento = $_GET["datanascimento"];
        $endereco = strtoupper($_GET["endereco"]);
        $estatus = strtoupper($_GET["estatus"]);
        
        ##validação
        ##testa se o nome está vazio
        if(empty($nome) || empty($cpf)|| empty($idade)|| empty($datanascimento)|| empty($endereco)){
            echo '<script>alert("O Digite todos os dados do Professor!"); window.location.href = "cadprofessor.php"</script>';
           }    
           ##testa se a idade é maior q 16
                else { if($idade <= 18 || $idade >= 100){
                     echo '<script>alert("A idade minima deve ser entre 18 e 100!"); window.location.href = "cadprofessor.php"</script>';
                } else{
                    ##codigo SQL
                    $sql = "INSERT INTO professor(nome, cpf, idade, datanascimento, endereco, estatus ) 
                     VALUES('$nome', '$cpf', '$idade', '$datanascimento', '$endereco', '$estatus')";
                    ##junta o codigo sql a conexao do banco
                    $sqlcombanco = $conexao->prepare($sql);
        
                     ##executa o sql no banco de dados
                    if($sqlcombanco->execute())
                    {
                        echo '<script>alert("O Professor(a) foi cadastrado com sucesso!"); window.location.href = "listaprofessor.php"</script>';
                    }
               }}  
        }

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id = $_POST["id"];
    $nome = strtoupper($_POST["nome"]);
    $cpf =  filter_var($_POST["cpf"], FILTER_SANITIZE_NUMBER_INT);
    $idade = filter_var($_POST["idade"], FILTER_SANITIZE_NUMBER_INT);
    $datanascimento = $_POST["datanascimento"];
    $endereco = strtoupper($_POST["endereco"]);
    $estatus = strtoupper($_POST["estatus"]);
    

      ##codigo sql
    $sql = "UPDATE  professor SET nome= :nome, cpf= :cpf, idade= :idade, datanascimento= :datanascimento, endereco= :endereco, estatus= :estatus WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_INT);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento',$datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus',$estatus, PDO::PARAM_STR);
    $stmt->execute();
 
    if($stmt->execute())
        {
            echo '<script>alert("O Professor(a) foi alterado com sucesso!"); window.location.href = "listaprofessor.php"</script>';
        }
}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo '<script>alert("O professor(a) foi excluido com sucesso!"); window.location.href = "listaprofessor.php"</script>';
        }

}       
?>