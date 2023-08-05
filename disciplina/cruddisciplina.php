<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET

        $nomedisciplina = strtoupper($_GET["nomedisciplina"]);
        $ch = filter_var($_GET["ch"], FILTER_SANITIZE_NUMBER_INT);
        $semestre = strtoupper($_GET["semestre"]);
        $idprofessor = filter_var($_GET["idprofessor"], FILTER_SANITIZE_NUMBER_INT);
        
        ##testa se o nome está vazio
        if(empty($nomedisciplina) || empty($ch) || empty($semestre) || empty($idprofessor)){
         echo '<script>alert("O Digite todos os dados da disciplina!"); window.location.href = "caddisciplina.php"</script>';
        }else{
        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor) 
        VALUES('$nomedisciplina', '$ch', '$semestre', '$idprofessor')";
        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
         if($sqlcombanco->execute()){
        echo '<script>alert("A disciplina foi cadastrada com sucesso!"); window.location.href = "listadisciplina.php"</script>';
        }
            
        }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id = $_POST["id"];
    $nomedisciplina = strtoupper($_POST["nomedisciplina"]);
    $ch = filter_var($_POST["ch"], FILTER_SANITIZE_NUMBER_INT);
    $semestre = strtoupper($_POST["semestre"]);
    $idprofessor = filter_var($_POST["idprofessor"], FILTER_SANITIZE_NUMBER_INT);
    
      ##codigo sql
    $sql = "UPDATE  disciplina SET nomedisciplina= :nomedisciplina, ch= :ch, semestre= :semestre, idprofessor= :idprofessor WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina',$nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_INT);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_INT);
    $stmt->execute();
 
    if($stmt->execute())
        {
            echo '<script>alert("A Disciplina foi alterada com sucesso!"); window.location.href = "listadisciplina.php"</script>';
        }
}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo '<script>alert("A disciplina foi excluida com sucesso!"); window.location.href = "listadisciplina.php"</script>';
        }

}       
?>