<html>
<head>
<title>Alteração</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body >

<?php

// exemplo de inserção de dados em uma tabela de um banco de dados

include "testa_banco.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$estado = $_POST['estado'];
$genero = $_POST['genero'];
$interesses = implode(", ", $_POST['interesses']);
$observacao = $_POST['observacao'];

$sql = 'UPDATE tb_usuario SET nome = \'' .$nome.'\', telefone = \''.$telefone.'\', dt_nascimento = \''.$data.'\', estado = \''.$estado.'\', genero = \''.$genero.'\', interesse = \''.$interesses.'\', observacao = \''.$observacao.'\' WHERE id = \''.$id.'\'';


if (mysqli_query($_con, $sql)) {
   echo "<br> <p class='text-center mt-5 fs-1 fw-bold m-2'>Registro alterado com sucesso</p>";
   echo "<p class='text-center fs-3 fw-bold m-2'><a href='consulta.php' class='link-dark link-offset-2 link-underline-opacity-100-hover'>Consultar Dados</a></p>";
} else {
   echo "<br>Error: " . $sql . "<br>" . mysqli_error($_con);
}
mysqli_close($_con);


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
