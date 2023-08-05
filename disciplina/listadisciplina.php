<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disciplinas</title>
    <style>
        *{
            margin:0%;
        }
        body{
            background-color: #d1dec5;
            margin-top: 80px;
            margin-left: 60px;
        }
        table{
            border-collapse: collapse;
            height: 60px;
            width: 1200px;
            text-align: center;
        }
        td, th{
            border: 5px solid #49793d;
            height: 60px;
            width: 1200px;
            background-color: #fffff3;
            font-family:Georgia, 'Times New Roman', Times, serif;
            color: #49793d;
        }
        p{
            font-family:Georgia, 'Times New Roman', Times, serif;
            color: #49793d;
            font-size: 70px;
        }
        a:link{
          text-decoration: none;
          color: #49793d;
          font-size: 18px;
         }
        button{
        background-color: #769b6a;
        height: 50px;
        width: 130px;
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
    <p>Lista de Disciplinas Cadastradas</p>
    <br>
    <br>
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>CARGA HORÁRIA</th>
                    <th>SEMESTRE</th>
                    <th>ID PROFESSOR</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nomedisciplina']?>  </td> 
                            <td> <?php echo $value['ch']?>  </td> 
                            <td> <?php echo $value['semestre']?> </td> 
                            <td> <?php echo $value['idprofessor']?> </td> 

                            <td>
                               <form method="POST" action="altdisciplina.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit" style="color:#fffff3">Alterar</button>
                                </form>

                             </td> 

                             <td>
                               <form method="GET" action="cruddisciplina.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="excluir"  type="submit" style="color:#fffff3">Excluir</button>
                                </form>

                             </td> 
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
        <br>
        
    <button class='button button3'><a href='../index.php' style="color:#fffff3";>Voltar</a></button>
    <button class='button button3'><a href='caddisciplina.php' style="color:#fffff3">Nova Disciplina</a></button>

</body>
</html>
