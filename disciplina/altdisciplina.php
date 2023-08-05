<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Disciplina</title>
    <style>
      *{
      margin: 0%;
      }
      body{
        background-color: #fffff3;
      }
      .formulario{
        height: 550px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .titulo{
        height: 170px;
        width: 100%;
        background-color: #a4bc98;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family:Georgia, 'Times New Roman', Times, serif;
        color: #49793d;
        font-size: 90px;
      }
      label{
        font-family:Georgia, 'Times New Roman', Times, serif;
        color: #49793d;
        font-size: 25px;
      }
      input, select{
        color: #49793d;
        font-size: 20px;
        width: 400px;
        height: 30px;
        background-color: #a4bc98;
        border: 0px;
      }
      a:link{
          text-decoration: none;
          color: #49793d;
          font-size: 20px;
         }
      .rodape{
        height: 90px;
        width: 100%;
        background-color: #a4bc98;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      button{
        font: #fffff3;
        background-color: #769b6a;
        height: 40px;
        width: 120px;
        font-family:Georgia, 'Times New Roman', Times, serif;
        font: #49793d;
        border-radius: 20px;
        border: 0px;
        margin: 25px;
        font-size: 18px;
      }
    </style>
</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre = $array_retorno['semestre'];
   $idprofessor = $array_retorno['idprofessor'];

?>
 <div class="titulo">
    Alterar Dados da Disciplina
  </div>
  <div class="formulario">
    <form method="POST" action="cruddisciplina.php">
    <label for="nome">Nome:</label>
    <br>
    <input type="text" name="nomedisciplina" value= "<?php echo $nomedisciplina?>" required>
    <br>
    <br>
    <label for="ch">Carga Horária:</label>
    <br>
    <input type="number" name="ch" value= "<?php echo $ch?>" required>
    <br>
    <br>
    <label for="semestre">Semestre:</label >
    <br>
    <input type="text" name="semestre"  value=<?php echo $semestre ?> required>
    <br>
    <br>
    <label for="idprofessor">Id Professor:</label>
    <br>
    <input type="number" name="idprofessor" value=<?php echo $idprofessor ?>required>
    <br>
    <br>
    <input type="hidden" name="id" id="" value=<?php echo $id ?> >
    <br>
    <button type="submit" name="update" value="Alterar" style="color:#fffff3">Alterar</button>
    </form>

  </div>

<div class="rodape">
<p style="color: #49793d;">Guanambi, 2023<br>
Copyright &copy;</p>
</div>
</body>
</html>