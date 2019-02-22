<?php
include "bd/conecta.php";
$id = $_GET['id'];

$del_movie = "DELETE FROM  filmes WHERE codFilme='$id'";
mysqli_query ($con, $del_movie) or
die ("Erro na exclusão do Filme: " . mysqli_error($con));

header("Location: list_movie.php?removido=true");
die();
?>
