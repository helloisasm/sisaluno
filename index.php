<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Acadêmico</title>
    <style>
        *{
            margin: 0%;
        }
        body{
            background-color: #d1dec5;
            display: flex;
            justify-content:center;
            align-items: center;
            flex-wrap: wrap;
        }
        .titulo{
            height: 200px;
            width: 100%;
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-size: 90px;
            display: flex;
            justify-content:center;
            align-items: center;
            background-color:#769b6a;
        }
        .rodape{
            height: 80px;
            width: 100%;
            display: flex;
            background-color:#769b6a;
            justify-content:center;
            align-items: center;
        }
        button{
            background-color: #769b6a;
            height: 100px;
            width: 400px;
            font-family:Georgia, 'Times New Roman', Times, serif;
            font: #49793d;
            border-radius: 50px;
            border: #fffff3 solid 10px;
            margin: 80px;
            color: #769b6a;
         }
         a:link{
            text-decoration: none;
            color: #769b6a;
            font-size: 40px;
         }
    </style>
</head>
<body>
    <div class="titulo">
        <p style="color: #fffff3;">Controle Acadêmico</p>
    </div>
    <br>
    <div class="botao">
    <button class="button"><a href="./aluno/listaalunos.php" style="color:#fffff3;">Ver Alunos</a></button> 
    </div>
    <div class="botao">
    <button class="button"><a href="./professor/listaprofessor.php" style="color:#fffff3;">Ver Professores</a></button> 
    </div>
    <div class="botao">
    <button class="button"><a href="./disciplina/listadisciplina.php" style="color:#fffff3;">Ver Disciplinas</a></button> 
    </div>
    <div class="rodape">
        <p style="color: #fffff3;">Guanambi, 2023<br>
         Copyright &copy;</p>
    </div>
</body>
</html>