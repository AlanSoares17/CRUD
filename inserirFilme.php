<?php
include "bd/conecta.php";

$tipoFilme = $_POST["tipoFilme"];
$codFilme =(int)$_POST["codFilme"];
$descFilme  =$_POST["descFilme"];
$fotoFilme = $_FILES["fotoFilme"]["name"];
$tamanho = $_FILES["fotoFilme"]["size"];
$tipoArquivo = $_FILES["fotoFilme"]["type"];
$nomeTemporario = $_FILES["fotoFilme"]["tmp_name"];
if( ($fotoFilme <> "") and ($tamanho > 0) )
{
$destino = "arquivos/" . $fotoFilme ;
if (move_uploaded_file ($nomeTemporario, $destino ) )
echo "Arquivo da foto recebido com sucesso!<br>";
else
echo "Erro no recebimento do arquivo da foto :" . 
$_FILES["foto"]["error"];
}

//validando input


if ($tipoFilme == "") {
    die("Coloque um nome valido<br><a href='add_movie.php'>Voltar</a>"	);
}

//Comando para inserir no banco
if ($codFilme == 0 ){
$comandoMySQL = "insert into filmes (
  codFilme,
  tipoFilme,
  fotoFilme,
  descfilme)
  values(
   '$codFilme' ,
  '$tipoFilme' ,
  '$fotoFilme' ,
  '$descFilme' 
);";
mysqli_query($con, $comandoMySQL)
  or die("Erro na inclusão do Filme:" .
    mysqli_error($con) );
header("Location: add_movie.php?incluido=true");
  die();
}else {
    $comandoMySQL = "update filmes set
    codFilme = '$codFilme' ,
    tipoFilme = '$tipoFilme' ,
    fotoFilme= '$fotoFilme' ,
    descFilme= '$descFilme'
    WHERE codFilme = $codFilme";
      mysqli_query($con, $comandoMySQL)
    or die("Erro na inclusão do Filme:" .
      mysqli_error($con) );

  header("Location: list_movie.php?incluido=true");
    die();

}

  ?>
