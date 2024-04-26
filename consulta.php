<?php
include "testa_banco.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consulta de dados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #68ddbd">
<h1 style="margin-top: 20px" class="text-center">Consultas</h1>
<br>
<?php

$res = mysqli_query($_con, "SELECT * FROM tb_usuario");

$num_linhas = mysqli_num_rows($res);
echo '
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Estado</th>
      <th scope="col">Gênero</th>
      <th scope="col">Interesses</th>
      <th scope="col">Observação</th>
      <th scope="col">Deleção</th>
      <th scope="col">Alteração</th>
    </tr>
  </thead>
  <tbody>
';

for($i=0 ; $i<$num_linhas; $i++)
{
    $dados = mysqli_fetch_row ($res);
    $id= $dados[0];
    $nome = $dados[1];
    $telefone = $dados[2];
    $data = $dados[3];
    $estado = $dados[4];
    $genero = $dados[5];
    $interesses = $dados[6];
    $observacao = $dados[7];

    echo "
    <tr>
      <td>$id</td>
      <td>$nome</td>
      <td>$telefone</td>
      <td>$data</td>
      <td>$estado</td>
      <td>$genero</td>
      <td>$interesses</td>
      <td>$observacao</td>
      <td><a href='deletar.php?id=".$id."' class='btn btn-danger'>Deletar</a></td>
      <td><a href='alterar.php?id=".$id."' class='btn btn-warning'>Alterar</a></td>
    </tr> 
    ";
}

echo'
    </tbody>
</table>
';
mysqli_close($_con);

?>
    <p class='text-center fs-3 fw-bold m-2'><a href='cadastro.html' class='link-dark link-offset-2 link-underline-opacity-100-hover'>Novo Cadastro</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>