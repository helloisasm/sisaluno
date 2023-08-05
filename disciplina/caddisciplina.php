<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplina</title>
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
  <div class="titulo">
    Cadastro de Disciplina
  </div>
  <div class="formulario">
    <form method="GET" action="cruddisciplina.php">
    <label for="nome">Nome:</label>
    <br>
    <input type="text" name="nomedisciplina" >
    <br>
    <br>
    <label for="ch">Carga Horária:</label >
    <br>
    <input type="number" name="ch">
    <br>
    <br>
    <label for="semestre">Semestre:</label>
    <br>
    <input type="text" name="semestre" >
    <br>
    <br>
    <label for="idprofessor">Id Professor:</label>
    <br>
    <input type="number" name="idprofessor" >
    <br>
    <br>
    <button type="submit" name="cadastrar" value="Cadastrar" style="color:#fffff3">Cadastrar</button>
    <button class="button"><a href="../index.php" style="color:#fffff3">Voltar</a></button>
    </form>

  </div>

<div class="rodape">
<p style="color: #49793d;">Guanambi, 2023<br>
Copyright &copy;</p>
</div>
</body>
</html>