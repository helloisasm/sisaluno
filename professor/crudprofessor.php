<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET

        $testenome = strtoupper($_GET["nome"]);
        $testecpf = $_GET["cpf"];
        $testeidade = $_GET["idade"];
        $datanascimento = $_GET["datanascimento"];
        $endereco = strtoupper($_GET["endereco"]);
        $estatus = $_GET["estatus"];
        
        ##testa se o nome está vazio
        if(empty($testenome)){
         echo '<script>alert("O Digite o nome!"); window.location.href = "cadprofessor.php"</script>';
        }else{
            $nome = filter_var($testenome, FILTER_SANITIZE_STRING);
        }
        ##testa se o cpf esta vazio
        if(empty($testecpf)){
        echo '<script>alert("O Digite o cpf!"); window.location.href = "cadprofessor.php"</script>';
        }else{
            $cpf = $testecpf;
        }
        ##testa se a idade é maior que 18 anos
        if($testeidade <= 18){
            echo '<script>alert("O Digite uma idade válida!"); window.location.href = "cadprofessor.php"</script>';
        }else{
            $idade = $testeidade;
        }

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
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];
    

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
    $stmt->bindParam(':estatus',$estatus, PDO::PARAM_INT);
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