<?php include "cabecalho.php";
include "bd/conecta.php";
$id = $_GET['id'];
$comando="SELECT * FROM filmes WHERE codFilme=$id";

$rs = mysqli_query($con , $comando) or
die("Erro na seleção do
   registro $id" . mysqli_error($con));

$linhas = mysqli_num_rows($rs);

if ($linhas <1)
    die("Código $id não encontrado. Registro foi excluído?" );

$dados = mysqli_fetch_array($rs);
$codFilme = $dados["codFilme"];
$tipoFilme = $dados["tipoFilme"];
$fotoFilme = $dados["fotoFilme"];
$descFilme = $dados["descFilme"];

if(array_key_exists("incluido", $_GET) && $_GET["incluido"]=='true') {
    echo "<script type='text/javascript'>
   						alert('Dados alterados com sucesso!');
  					  </script>";
}
?>
<div style='height: 100%; width: 85%; padding:10px;'>
    <h1> <center>Alteração de Filme</h1></center>

    <table class="table table-striped">
        <form action='inserirFilme.php' method='post' enctype='multipart/form-data'>
            <tr>
				
                <input name="codFilme" type="number"value="<?=$id?>" hidden>
            <tr>
                <td>Tipo de Filme</td>
                <td><input type="text" name="tipoFilme"value=<?=$tipoFilme?> ></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><input name="descFilme" type="text" value=<?=$descFilme?>></td>
            </tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="fotoFilme" value=<?=$fotoFilme?>></td>
			</tr>
			
            <hr>
    </table>
    <input  type="submit" value="Enviar">
</div>



<?php include "rodape.php";?>
