<?php include "cabecalho.php";  include 'bd/conecta.php';?>

<div style='height: 100%; width: 85%; padding:10px;'>
    <center><h1> Filmes Cadastrados</h1></center>
    <br>
    <table cellSpacing=1 cellPadding=0 width=544 border=5 align=center>
        <tr>
            <th>Código</th>
            <th>Imagem (caminho)</th>
            <th>Nome do filme</th>
            <th>Desc. do filme</th>
            <th colspan='2'>Função</th>
        </tr>

        <?php

       

        $consultaFilme = "SELECT codFilme,
        fotoFilme,
        tipoFilme,
        descFilme
        FROM filmes;";

        $rs /*record set*/ = mysqli_query($con, $consultaFilme) or
        die ("Erro na seleção de Filmes" . mysqli_error($con));

        //4- Pega  o múmero de registros/linhas
        $linhas = mysqli_num_rows($rs);

        //se não tem nenhum resgistro, parar
        if ($linhas < 1) die("Lista de <b> Filmes</b> esta vazia! :(");
        //retorno de mensagem na tela
        if (array_key_exists("incluido", $_GET) && $_GET["incluido"] == 'true') {
            echo "<script type='text/javascript'>
						alert('Alteração Efetuada com Sucesso!!!');
						</script>";
        }
        if (array_key_exists("removido", $_GET) && $_GET["removido"] == 'true') {
            echo "<script type='text/javascript'>
						alert('Filme excluído com sucesso!');
						</script>";
        }
        //listar os dados
        $contador = 0;

        while ($contador < $linhas) {
		
			
            $dados = mysqli_fetch_array($rs);
            $codFilme = $dados["codFilme"];
			$fotoFilme =$dados["fotoFilme"];
            $tipoFilme = $dados["tipoFilme"];
            $descFilme= $dados["descFilme"];

			echo "<td>$codFilme</td>";
			echo "<td><img src ='arquivos/$fotoFilme' width='125px' height='125px'></td>";
            echo "<td>$tipoFilme</td>";
            echo "<td>$descFilme</td>";
            echo "<td><a href='del_movie.php?id=$codFilme'>DELETAR</a></td>";
            echo "<td><a href='change_movie.php?id=$codFilme'>ALTERAR</a></td>";
            echo "<tr>";
            $contador++;

        }
        ?></table>
</div>
<?php include "rodape.php"; ?>
