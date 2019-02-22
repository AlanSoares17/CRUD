<?php include "cabecalho.php";

if (array_key_exists("incluido", $_GET) && $_GET["incluido"] == 'true') {
    echo "<script type='text/javascript'>
              alert('Filme incluido com sucesso!');
              </script>";
} ?>
<div style='height: 100%; width: 100%; padding:50px;'>
    <h1>
        <center>Cadastro de Filme
    </h1>
    </center>

    <table class="table table-striped">
        <form action='inserirFilme.php' method='post' enctype='multipart/form-data'>
            <input name="codFilme" type="number" value="0" hidden>
            <tr>
                <td>Capa do filme</td>
                <td><input type="file" name="fotoFilme"> </td>
            </tr>
            <tr>
                <td>Nome do Filme</td>
                <td><input type="text" name="tipoFilme"></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><input name="descFilme" type="text"></td>

            <hr>
    </table>
    <input type="submit" value="Enviar">
</div>


<?php include "rodape.php"; ?>
